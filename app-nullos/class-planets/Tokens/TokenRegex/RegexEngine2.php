<?php


namespace Tokens\TokenRegex;


use Tokens\TokenRegex\Element\AtomElement;
use Tokens\TokenRegex\Element\ElementInterface;
use Tokens\TokenRegex\Exception\EndOfModelException;
use Tokens\TokenRegex\Exception\EndOfSequenceException;

/**
 * See TokenModel for general explanations on model.
 */
class RegexEngine2
{

    private $matchedElements;
    private $tokenIdentifiers;
    private $curSequenceIndex;
    private $maxSequenceIndex;

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
        $modelElements = $model->getElements();
        $this->curModelIndex = 0;
        $this->maxModelIndex = count($modelElements) - 1;
        if ($this->maxModelIndex < 0) {
            return false;
        }


        //--------------------------------------------
        // WE DO ALL MODEL ELEMENTS, ONE BY ONE
        //--------------------------------------------
        $firstElement = array_shift($modelElements);

        try {
            if (true === $this->findFirstMatch($firstElement)) {
                // note: the first element is never optional
                // todo modificators?
                $this->matchedElements[] = $firstElement;
                $this->moveSequenceForward();
                $this->moveModelForward();


                while ($element = array_shift($modelElements)) {
                    if ($element instanceof AtomElement) {
                        if (true === $this->matchAtom($element, $this->tokenIdentifiers[$this->curSequenceIndex])) {
                            $this->matchedElements[] = $element;
                            // todo...modificators?
                            $this->moveSequenceForward();
                        }
                    } else {
                        throw new \Exception("Unknown element type " . get_class($element));
                    }
                    $this->moveModelForward();
                }

            }
        } catch (EndOfSequenceException $e) {
            // on sequence end, todo...
            a("sequence end has been reached");
        }
        catch (EndOfModelException $e) {
            // on model end, todo...
            a("model end has been reached");
            a($this->matchedElements);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------



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


    private function moveSequenceForward()
    {
        $this->curSequenceIndex++;
        if ($this->curSequenceIndex > $this->maxSequenceIndex) {
            throw new EndOfSequenceException();
        }
    }

    private function moveModelForward()
    {
        $this->curModelIndex++;
        if ($this->curModelIndex > $this->maxModelIndex) {
            throw new EndOfModelException();
        }
    }

}