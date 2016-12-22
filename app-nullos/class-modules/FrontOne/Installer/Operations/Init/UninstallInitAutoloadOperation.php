<?php


namespace FrontOne\Installer\Operations\Init;




use Installer\Operation\Init\InitAutoloadOperation\InitAutoloadOperation;

class UninstallInitAutoloadOperation extends InitAutoloadOperation
{

    public function __construct()
    {
        $this->setLocationTransformer(function (array &$locations) {
            $loc = '__DIR__ . "/../class-shared"';
            foreach ($locations as $k => $loca) {
                if ($loca === $loc) {
                    unset($locations[$k]);
                }
            }
        });
    }

    public static function create()
    {
        return new self();
    }

}