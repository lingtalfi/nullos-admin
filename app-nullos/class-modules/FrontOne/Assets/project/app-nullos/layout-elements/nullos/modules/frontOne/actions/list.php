<?php


use Crud\ArrayDataTable;
use FrontOne\ArticleCrud\ArticleCrudUtil;
use FrontOne\ArticleCrud\ArticleScannerUtil;
use FrontOne\ArticleCrud\Exception\ArticleCrudCannotDeleteProtectedException;
use FrontOne\FrontOneConfig;
use FrontOne\Util\ArticlesUtil;
use Layout\Goofy;


?>
    <div class="tac bignose install-page">
        <h3>Articles</h3>
        <p>
            <a href="<?php
            echo url(FrontOneConfig::getArticlesUri(), [
                'action' => 'edit',
            ]);
            ?>">Create a new article</a>
        </p>
    </div>
<?php


$list = ArticleScannerUtil::getAllArticles();
$arr = ArticlesUtil::articlesListToArray($list);
$table = new ArrayDataTable();
$table->searchColumns = [
    'label',
    'content',
    'anchor',
    'position',
];
$table->customizeWidget('newItemLink', false);
//$table->nbItemsPerPage = 2;
$table->registerSingleAction(
    'delete',
    '<a class="action-link postlink confirmlink" data-action="delete" data-ric="{ric}" href="#">Delete</a>',
    function ($table, $ric, $_table) use ($arr) {
        try {
            $anchor = $ric['anchor'];
            ArticleCrudUtil::delete($anchor);
            foreach ($arr as $k => $item) {
                if ($anchor === $item['anchor']) {
                    unset($arr[$k]);
                }
            }
            $_table->updateArray($arr);
        } catch (ArticleCrudCannotDeleteProtectedException $e) {
            Goofy::alertError($e->getMessage());
        } catch (\Exception $e) {
            Logger::log($e, "frontOne.delete");
            Goofy::alertError("Oops, an error occurred, please check the logs");
        }
    }
);
$table->registerSingleAction(
    'edit',
    '<a class="action-link" href="' . url(FrontOneConfig::getArticlesUri(), [
        'action' => 'edit',
        'ric' => '{ric}',
    ], true, false) . '">Edit</a>',
    null
);
$table->registerMultipleAction('deleteAll', "Delete all", function ($table, $rics, $_table) use ($arr) {
    try {
        foreach ($rics as $ric) {
            $anchor = $ric['anchor'];
            ArticleCrudUtil::delete($anchor);
            foreach ($arr as $k => $item) {
                if ($anchor === $item['anchor']) {
                    unset($arr[$k]);
                }
            }
            $_table->updateArray($arr);
        }
    } catch (ArticleCrudCannotDeleteProtectedException $e) {
        Goofy::alertError($e->getMessage());
    } catch (\Exception $e) {
        Logger::log($e, "frontOne.delete");
        Goofy::alertError("Oops, an error occurred, please check the logs");
    }
}, true);

$table->setTransformer('content', function ($v, $item) {
    return substr(htmlspecialchars($v), 0, 30) . '...';
});
$table->printArrayTable($arr, ['anchor']);
