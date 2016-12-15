<?php


namespace Tokens\TokenRegex\Element;


class AtomElement implements ElementInterface
{


    private $_symbol;


    public function __construct()
    {
        $this->_symbol = null;
    }

    public static function create()
    {
        return new self();
    }

    public function symbol($s)
    {
        $this->_symbol = $s;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------

    public function getSymbol()
    {
        return $this->_symbol;
    }

    public function __toString()
    {
        return (string)$this->_symbol;
    }
}