<?php


class FormControl
{

    private $_type;
    private $_typeArgs;
    private $_label;
    private $_value;


    //--------------------------------------------
    // METHODS MEANT TO BE USED BY THE DEVELOPER
    //--------------------------------------------
    public function type($type)
    {
        $this->_type = $type;
        $args = func_get_args();
        array_shift($args);
        $this->_typeArgs = $args;
        return $this;
    }

    public function label($label)
    {
        $this->_label = $label;
        return $this;
    }

    public function value($value)
    {
        $this->_value = $value;
        return $this;
    }







    //--------------------------------------------
    // METHODS MEANT TO BE USED BY FORM ONLY, NOT THE DEVELOPER
    //--------------------------------------------
    public function getType()
    {
        return $this->_type;
    }

    public function getTypeArgs()
    {
        return $this->_typeArgs;
    }

    public function getLabel()
    {
        return $this->_label;
    }

    public function getValue()
    {
        return $this->_value;
    }

}