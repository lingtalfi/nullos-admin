<?php

namespace Installer\Report\ReportMessage;


class ReportMessage implements ReportMessageInterface
{
    private $message;

    /**
     * msg can be anything:
     * - string
     * - exception
     *
     */
    public function __construct($msg)
    {
        $this->message = $msg;
    }

    public function getMessage()
    {
        return $this->message;
    }
}