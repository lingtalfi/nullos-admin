<?php


use DirTransformer\Scanner\Scanner;
use DirTransformer\Transformer\TrackingMapRegexTransformer;
use Linguist\Util\Equalizer;
use Linguist\Util\LangScanner;
use Linguist\Util\LinguistScanner;
use Tokens\TokenRepresentation\ReplacementSequence;
use Tokens\TokenRepresentation\ReplacementSequenceToken;
use Tokens\TokenRepresentation\TokenRepresentation;
use Tokens\Tokens;

require __DIR__ . "/../init.php";


function getTheList($definitionItems, $mode, $groupByFiles, $alpha)
{
    /**
     * Nomenclature
     * ---------------
     *
     * item: array containing 4 entries;
     *      - 0: file path
     *      - 1: key
     *      - 2: value
     *      - 3: isSameAsRefLang
     *
     *
     *
     * Results
     * --------------
     * At the end of this big mess,
     * theList will be like this:
     *
     * - if mode = all
     *      - if files=false
     *              - one big array of <item>s
     *      - if files=true
     *              - an array of file => <item>s
     *
     * - if mode != all
     *      - if files=false
     *              - one array containing 2 entries (modified and unmodified):
     *                   0: <item>s
     *                   1: <item>s
     *      - if files=true
     *              - one array containing 2 entries (modified and unmodified):
     *                   0: array of file => <item>s
     *                   1: array of file => <item>s
     *
     *
     *
     *
     * alpha sorting operates only within the smallest container array (either a file, or the
     * unmodified/modified category).
     *
     *
     */
    $theList = [];

    $itemSort = function ($item1, $item2) {
        return ($item1[1] > $item2[1]);
    };

    if ('all' === $mode) {
        if (true === $groupByFiles) {
            $theList = $definitionItems;
            if (true === $alpha) {
                foreach ($theList as $file => &$items) {
                    usort($items, $itemSort);
                }
            }
        } else {
            foreach ($definitionItems as $items) {
                $theList = array_merge($theList, $items);
            }
            if (true === $alpha) {
                usort($theList, $itemSort);
            }
        }
    } else {
        $theModified = [];
        $theUnmodified = [];

        if (true === $groupByFiles) {


            foreach ($definitionItems as $file => $items) {
                foreach ($items as $item) {
                    if (true === $item[3]) {
                        $theUnmodified[$file][] = $item;
                    } else {
                        $theModified[$file][] = $item;
                    }
                }
            }


            if (true === $alpha) {
                foreach ($theModified as $file => &$items) {
                    usort($items, $itemSort);
                }
                foreach ($theUnmodified as $file => &$items2) {
                    usort($items2, $itemSort);
                }
            }
        } else {
            foreach ($definitionItems as $items) {
                foreach($items as $item){
                    if (true === $item[3]) {
                       $theUnmodified[] = $item;
                    }
                    else{
                       $theModified[] = $item;
                    }
                }
            }

            if (true === $alpha) {
                usort($theModified, $itemSort);
                usort($theUnmodified, $itemSort);
            }
        }
        $theList = [
            $theModified,
            $theUnmodified,
        ];

    }
    return $theList;
}


$alpha = true;
$group = false;
$mode = 'modified';
$mode = 'all';
$mode = 'unmodified';
$defItems = LinguistScanner::getDefinitionItems("fr", "en");
a(getTheList($defItems, $mode, $group, $alpha));





