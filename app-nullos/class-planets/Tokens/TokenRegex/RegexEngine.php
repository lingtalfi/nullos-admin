<?php


namespace Tokens\TokenRegex;


use Tokens\TokenRegex\Element\AtomElement;
use Tokens\TokenRegex\Element\ElementInterface;
use Tokens\TokenRegex\Exception\EndOfModelException;
use Tokens\TokenRegex\Exception\EndOfSequenceException;
use Tokens\TokenRegex\Exception\ModelDoesNotMatchException;

/**
 * See TokenModel for general explanations on model.
 */
class RegexEngine
{

    private $matchedElements;
    private $tmpMatchedElements;
    private $tokenIdentifiers;
    private $modelElements;
    private $curSequenceIndex;
    private $maxSequenceIndex;
    private $curTmpSeqIndex;

    private $curModelIndex;
    private $maxModelIndex;

    public function __construct()
    {
        $this->_symbol = null;
    }

    public static function create()
    {
        return new self();
    }

    public function match(array $tokenIdentifiers, TokenModel $model, $func)
    {
        $this->matchedElements = [];

        $this->tokenIdentifiers = $tokenIdentifiers;
        $this->curSequenceIndex = 0;
        $this->maxSequenceIndex = count($tokenIdentifiers) - 1;
        if ($this->maxSequenceIndex < 0) {
            return false;
        }

        $this->modelElements = $model->getElements();
        $this->maxModelIndex = count($this->modelElements) - 1;
        if ($this->maxModelIndex < 0) {
            return false;
        }
        $this->curTmpSeqIndex = 0;


        for ($seqIndex = $this->curSequenceIndex; $seqIndex <= $this->maxSequenceIndex; $seqIndex++) {
            if (true === $this->matchModel($seqIndex)) {
                $this->matchedElements[] = $this->tmpMatchedElements;
            }
        }


        foreach ($this->matchedElements as $match) {
            call_user_func($func, $match);
        }

    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * if a match occurs, then the matchedElements array should be updated
     */
    private function matchModel(&$index)
    {
        $modelMatches = false;
        $this->curModelIndex = 0;
        $this->curTmpSeqIndex = $index;
        $this->tmpMatchedElements = [];

        try {

            $modelElements = $this->modelElements;
            /**
             * Move through every element of the model, the result should be binary:
             * - either the current iteration fails
             * - or the current iteration succeeds
             *
             */
            while ($element = array_shift($modelElements)) {
                if ($element instanceof AtomElement) {
                    if (true === $this->matchAtom($element, $this->tokenIdentifiers[$this->curTmpSeqIndex])) {
                        $this->tmpMatchedElements[] = $element;
                        // todo...modificators?
                        $this->moveModelForward();
                    } else {
                        $this->modelFails();
                    }
                } else {
                    throw new \Exception("Unknown element type " . get_class($element));
                }
            }

        } catch (ModelDoesNotMatchException $e) {
        } catch (EndOfModelException $e) {
            $modelMatches = true;

        } catch (EndOfSequenceException $e) {

        }
        if (true === $modelMatches) {
            $index = $this->curModelIndex;
            return true;
        }
        return false;
    }


    private function findFirstMatch(ElementInterface $element)
    {
        if ($element instanceof AtomElement) {
            for ($i = $this->curSequenceIndex; $i <= $this->maxSequenceIndex; $i++) {
                $this->curSequenceIndex = $i;
                if (true === $this->matchAtom($element, $this->tokenIdentifiers[$i])) {
                    return true;
                }
            }
        } else {
            throw new \Exception("Unknown element type: " . get_class($element));
        }
        return false;
    }


    private function matchAtom(AtomElement $element, $tokenIdentifier)
    {
        if ($element->getSymbol() === $tokenIdentifier) {
            return true;
        }
        return false;
    }


    private function moveModelForward()
    {
        $this->curModelIndex++;
        $this->curTmpSeqIndex++;
        if ($this->curModelIndex > $this->maxModelIndex) {
            throw new EndOfModelException();
        }
        if ($this->curTmpSeqIndex > $this->maxSequenceIndex) {
            throw new EndOfSequenceException();
        }
    }

    private function modelFails()
    {
        throw new ModelDoesNotMatchException();
    }

}