<?php


namespace Tokens\TokenRegex;


use Tokens\TokenRegex\Element\AtomElement;
use Tokens\TokenRegex\Fragment\TokenRegexFragment;


/**
 * The model is composed of elements, modificators and markers.
 *
 *
 * An element is one of the following:
 * - atom
 * - group
 * - alternate
 *
 * The atom is the smallest unit.
 * Groups are composed of atoms or groups.
 * Alternates is a special construct which allows parallelization
 * of groups.
 *
 *
 * A modificator can be applied to an element.
 * An element can only have one modificator at the time.
 * The following modificators are available:
 *
 * - ?: optional
 * - +: appears one or more times
 * - *: appears zero or more times
 * - ...other modificators like ranges could be developed in the future
 *
 *
 * Sequence
 * -------------
 * The model is tested against a sequence, which might/might not contain
 * one or more occurrences of the model.
 *
 * Each match is an opportunity to extract and/or replace the portion
 * of the sequence which matched the model.
 * The whole matching model is given to the developer.
 * The developer can also select the element she wants to work on using markers.
 *
 *
 * Markers
 * -----------
 * Markers help extracting and/or replacing the matching portion of the sequence.
 * When a marker is applied to an element, then if the model matches,
 * the marked elements are passed back to the developer, so that she can
 * change only those elements.
 * Markers are basically the equivalent of php regex's capture groups.
 *
 * A marker has a label, and many elements can be marked with the same label.
 * The developer then accesses the markers grouped by label.
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */
class TokenModel
{


    private $elements;


    public function __construct()
    {
        $this->elements = [];
    }


    public static function create()
    {
        return new self();
    }

    public function addAtom(AtomElement $element)
    {
        $this->elements[] = $element;
        return $this;
    }

    public function getElements()
    {
        return $this->elements;
    }

}