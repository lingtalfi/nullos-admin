<?php


namespace FrontOne\Installer\Operations\Router;




use Installer\Operation\RouterBridge\RouterBridgeUri2PagesOperation;

class InstallRouterBridgeUri2PagesOperation extends RouterBridgeUri2PagesOperation
{
    public function __construct()
    {
        $this->setLocationTransformerAppend('FrontOneModule::decorateUri2PagesMap($uri2pagesMap)');
    }

    public static function create()
    {
        return new self();
    }

}