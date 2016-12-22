<?php


namespace FrontOne\Installer\Operations\Init;


use Installer\Operation\Init\InitAutoloadOperation\InitAutoloadOperation;



class InstallInitAutoloadOperation extends InitAutoloadOperation
{

    public function __construct()
    {
        $this->setLocationTransformer(function (array &$locations) {
            $loc = '__DIR__ . "/../class-shared"';
            if (false === in_array($loc, $locations, true)) {
                $locations[] = $loc;
            }
        });
    }

    public static function create()
    {
        return new self();
    }

}