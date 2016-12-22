<?php


use Crud\ArrayDataTable;
use Layout\Goofy;
use ModuleInstaller\ModuleInstallerUtil;
use PublicException\PublicException;




?>
    <div class="tac bignose install-page">
        <h3><?php echo __("Modules", LL); ?></h3>
    </div>
<?php

if (
    array_key_exists('ric', $_POST) &&
    array_key_exists('value', $_POST)
) {
    $name = (string)$_POST['ric'];
    $value = (string)$_POST['value'];

    try {

        $msg = '';
        if ('uninstall' === $value) {
            ModuleInstallerUtil::uninstallModule($name);
            $msg = __("The module was successfully uninstalled", LL);
        } else {
            ModuleInstallerUtil::installModule($name);
            $msg = __("The module was successfully installed", LL);
        }
        Goofy::alertSuccess($msg, false, true);
    } catch (PublicException $e) {
        Goofy::alertError($e->getMessage());
    } catch (\Exception $e) {
        Goofy::alertError(__("Oops, an error occurred, please check the logs"));
        Logger::log($e);
    }
}


$arr = ModuleInstallerUtil::getModulesList();
$table = new ArrayDataTable();
$table->searchColumns = [
    'name',
];
$table->customizeWidget('newItemLink', false);
$table->customizeWidget('multipleActions', false);
//$table->customizeWidget('newItemLink', false);
$table->showCheckboxes = false;

//$table->nbItemsPerPage = 2;
$table->dropSingleActions(['edit', 'delete']);


$table->setTransformer('installer', function ($v, $item) {
    if (1 === $v) {
        return '
<div style="display: flex; justify-content: center">
<a href="#" data-action="" data-value="uninstall" data-ric="' . $item['name'] . '"  class="action-link postlink confirmlink">' . __("Uninstall", LL) . '</a> 
<span style="margin:0 10px">-</span> 
<a href="#" data-action="" data-value="install" data-ric="' . $item['name'] . '"  class="action-link postlink confirmlink">' . __("Install", LL) . '</a>
</div>
';
    }
    return '';
});

$table->setTransformer('core', function ($v, $item) {
    if (0 === $v) {
        return '
<a href="#" class="action-links">Remove</a>
';
    }
    return '';
});

$table->printArrayTable($arr, ['name']);
