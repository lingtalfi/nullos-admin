<?php


namespace FrontOne\Installer\Operations\Layout;

use Installer\Operation\LayoutBridge\LayoutBridgeDisplayLeftMenuBlocksOperation;


class InstallLayoutBridgeDisplayLeftMenuBlockOperation extends LayoutBridgeDisplayLeftMenuBlocksOperation
{

    public function __construct()
    {
        $this->setLocationTransformerAfter('FrontOneModule::displayLeftMenuBlocks()', 'ToolsLeftMenuSectionModule');
    }

    public static function create()
    {
        return new self();
    }

}