<?php

class FileArticle extends Article
{

    private $file;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        ob_start();
        require $this->file;
        return ob_get_clean();
    }

    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }


}


