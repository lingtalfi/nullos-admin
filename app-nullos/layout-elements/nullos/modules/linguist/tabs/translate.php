<?php


use Layout\Goofy;
use Linguist\LinguistConfig;
use Linguist\LinguistUtil;
use Linguist\Util\LinguistEqualizer;
use Linguist\Util\LinguistKey2ValueListForm;
use Linguist\Util\LinguistScanner;


$prefs = LinguistUtil::getPreferences();


$refLang = $prefs['refLang'];
$defaultMode = $prefs["translateTab"]['mode'];
$defaultAlpha = $prefs["translateTab"]['alpha'];
$defaultGroup = $prefs["translateTab"]['group'];

$form = LinguistKey2ValueListForm::create()
    ->lang($prefs['curLang'])
    ->mode($defaultMode)
    ->alpha($defaultAlpha)
    ->groupByFiles($defaultGroup)
    ->definitionItems(function ($curLang) use ($refLang) {
        return LinguistScanner::getDefinitionItems($curLang, $refLang);
    })
    ->titles("Modified translations", "Unmodified translations", "All translations");


$curLang = $form->getLang();


$langDir = LinguistConfig::getLangDir();
$refDir = $langDir . "/" . $refLang;
$dstDir = $langDir . "/" . $curLang;


$importSuccess = false;
if (array_key_exists('import', $_POST)) {
    $importSuccess = LinguistEqualizer::equalize($refDir, $dstDir);
}


$form->onSubmit(function ($curLang, array $file2Defs) use ($refLang) {
    $langDir = LinguistConfig::getLangDir();
    $refDir = $langDir . "/" . $refLang;
    $curDir = $langDir . "/" . $curLang;
    if (true === LinguistEqualizer::equalizeByFile2Definitions($refDir, $curDir, $file2Defs)) {
        return Goofy::alertSuccess("The translations for lang '$curLang' have been successfully updated", true);
    } else {
        return Goofy::alertError("Couldn't write the translations. Are your file permissions correct?", true);
    }
});


$form->onPreferencesChange(function ($curLang, array $newPrefs) {
    LinguistUtil::setPreferences([
        'curLang' => $curLang,
        "translateTab" => $newPrefs,
    ]);
});

$form
    ->displayHead();


if (true === $importSuccess) {
    Goofy::alertSuccess("Missing translations have been successfully imported");
}

$countMissing = LinguistEqualizer::countMissingDefinitions($dstDir, $refDir);

?>
<?php if ($countMissing > 0): ?>
    <div class="flexhe pad">
        <span>There are <?php echo $countMissing; ?> missing translation strings.</span>
        <form action="" method="post">
            <input type="hidden" name="import" value="1">
            <button type="submit" class="marl">Import from en</button>
        </form>
    </div>
<?php endif; ?>
<?php
$form->display();
