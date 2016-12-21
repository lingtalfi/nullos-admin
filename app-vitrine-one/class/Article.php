<?php

class Article
{
    private $content;
    private $anchor; // passed via the url
    private $label; // shown in the menu
    private $_isProtected; // prevent its deletion from gui


    public function __construct()
    {
        $this->content = '';
        $this->anchor = '';
        $this->label = '';
        $this->_isProtected = true;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnchor()
    {
        return $this->anchor;
    }

    public function setAnchor($anchor)
    {
        $this->anchor = $anchor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return bool
     */
    public function isProtected()
    {
        return $this->_isProtected;
    }

    public function setIsProtected($isProtected)
    {
        $this->_isProtected = $isProtected;
        return $this;
    }



}


