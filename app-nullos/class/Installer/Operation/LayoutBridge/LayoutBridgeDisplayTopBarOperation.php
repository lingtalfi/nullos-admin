<?php


namespace Installer\Operation\LayoutBridge;


use Installer\Operation\OperationInterface;
use Installer\Operation\Util\MethodArrayTransformer;
use Installer\Report\ReportInterface;
use Layout\LayoutBridge;

class LayoutBridgeDisplayTopBarOperation extends MethodArrayTransformer implements OperationInterface
{

    public static function create()
    {
        return new self();
    }

    public function execute(ReportInterface $report)
    {
        $this->replaceByMethod($report, LayoutBridge::class, 'displayTopBar');
    }


}