<?php

namespace LogWatcher\Util;


class Pagination
{
    private $nbPages;


    public function __construct($nbPages)
    {
        $this->nbPages = $nbPages;
    }

    public static function create($nbPages)
    {
        return new self($nbPages);
    }

    public function display()
    {

        ?>
        <section class="pagination">

        </section>
        <?php
    }
}