<?php


namespace FrontOne\Installer\Operations;

use Installer\Operation\DeployFile\DeployFileOperation;

class DeployFilesOperation extends DeployFileOperation
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->sourceDir(__DIR__ . "/../../InstallAssets/project")
            ->destDir(APP_ROOT_DIR . "/..");
    }

    public static function create()
    {
        return new self();
    }

}