<?php


namespace FrontOne\Installer\Operations\Layout;

use Installer\Operation\LayoutBridge\LayoutBridgeDisplayLeftMenuBlocksOperation;


class UninstallLayoutBridgeDisplayLeftMenuBlockOperation extends LayoutBridgeDisplayLeftMenuBlocksOperation
{

    public function __construct()
    {
        $this->setLocationTransformerRemoveBySubstr('FrontOneModule::displayLeftMenuBlocks()');
    }

    public static function create()
    {
        return new self();
    }

}