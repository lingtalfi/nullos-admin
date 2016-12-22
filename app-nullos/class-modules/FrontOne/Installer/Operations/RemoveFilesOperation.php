<?php


namespace FrontOne\Installer\Operations;

use Installer\Operation\DeployFile\RemoveFileOperation;

class RemoveFilesOperation extends RemoveFileOperation
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->sources([
                'class-shared/FrontOne',
                'app-vitrine-one',
                'app-nullos/lang/en/modules/frontOne',
                'app-nullos/layout-elements/nullos/modules/frontOne',
                'app-nullos/pages/modules/frontOne',
                'app-nullos/www/services/modules/frontOne',
            ])
            ->destDir(APP_ROOT_DIR . "/..");
    }

    public static function create()
    {
        return new self();
    }

}