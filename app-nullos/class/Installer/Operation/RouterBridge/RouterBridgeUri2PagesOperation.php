<?php


namespace Installer\Operation\RouterBridge;


use Installer\Operation\OperationInterface;
use Installer\Operation\Util\MethodArrayTransformer;
use Installer\Report\ReportInterface;
use Router\RouterBridge;

class RouterBridgeUri2PagesOperation extends MethodArrayTransformer implements OperationInterface
{

    public function execute(ReportInterface $report)
    {
        $this->replaceByMethod($report, RouterBridge::class, 'decorateUri2PagesMap', [
            'signature' => 'decorateUri2PagesMap(array &$uri2pagesMap)',
            'signaturePattern' => 'decorateUri2PagesMap\s*\(\s*array \s*&\$uri2pagesMap\)',
        ]);
    }

    public static function create()
    {
        return new self();
    }


}