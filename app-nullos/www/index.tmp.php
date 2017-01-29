<?php


use SrdExport\Exporter\FluxDetailCommandeExporter;
use SrdExport\Exporter\FluxEnteteCommandeExporterWithAddress;
use SrdExport\Exporter\Helper\ExporterHelper;

require_once __DIR__ . "/../init.php";


/**
 * @param $vat
 * @return bool
 *
 * https://en.wikipedia.org/wiki/VAT_identification_number#European_Union_VAT_identification_numbers
 * Accepted countries:
 *
 * - be
 * - de
 * - es
 * - fr
 * - it
 * - lu
 * - ch
 *
 *
 */
function isValidVat($vat)
{
    $country = strtolower(substr($vat, 0, 2));



    switch ($country) {
        case 'fr':
            $key = (int)substr($vat, 2, 2);
            $siren = (int)substr($vat, 4);
            $expectedKey = (12 + 3 * ($siren % 97)) % 97;
            break;
        case 'be':

            $expectedKey = 0;

            // 'BE'+ 10 digits the first digit following the prefix is always zero ("0") or ("1") –
            // e.g. BE0999999999. At this time no numbers starting with "1" are issued,
            // but this can happen any time. Note that the old numbering schema only had 9 characters,
            // separated with dots (e.g. 999.999.999),
            // just adding a zero in front and removing the dots makes it a valid number in the new schema.


            break;
        default;
            break;
    }


    return ($expectedKey === $key);
}


$num = '83404833048';
$num = 'FR83404833048';
a(isValidVat($num));

