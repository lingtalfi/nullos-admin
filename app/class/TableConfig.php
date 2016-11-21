<?php


class TableConfig
{
    private static $inst;


    public $viewQuery;

    private $name;
    private $fields;


    private function __construct()
    {
        $this->fields = [];




    }

    public static function create()
    {
        if (null === self::$inst) {
            self::$inst = new self;
        }
        return self::$inst;
    }


    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     *
     * Role
     * -----------------
     * - ai: auto incremented field
     *
     *
     *
     *
     *
     */
    public function registerField($name, $role = null)
    {
        $this->fields[$name] = [];
        return $this;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    public function getConf()
    {
        return $this->conf;
    }
}