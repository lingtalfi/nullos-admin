<?php


namespace FrontOne\Installer\Operations\Router;




use Installer\Operation\RouterBridge\RouterBridgeUri2PagesOperation;

class UninstallRouterBridgeUri2PagesOperation extends RouterBridgeUri2PagesOperation
{

    public function __construct()
    {
        $this->setLocationTransformerRemoveBySubstr('FrontOneModule::decorateUri2PagesMap');
    }

    public static function create()
    {
        return new self();
    }

}