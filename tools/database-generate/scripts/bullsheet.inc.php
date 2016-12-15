<?php


use BullSheet\Generator\LingBullSheetGenerator;
use BullSheet\Tool\PickRandomLineTool;
use DirScanner\YorgDirScannerTool;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoDbOperationTool;


if (isset($token)) {


    echo "<h1>Bullsheet Generator</h1>";
    require_once "bigbang.php"; // start the local universe


    //--------------------------------------------
    // CONFIG
    //--------------------------------------------
    $users = 100;
    $usersHasInstruments = 100;
    $usersHasStyles = 100;
    $videos = $users * 2;
    $coupsDeCoeur = 3;
    $avatarDir = __DIR__ . "/../../www/img/users/avatar";
    $videoThumbsDir = __DIR__ . "/../../www/img/video";


    //--------------------------------------------
    // SCRIPT
    //--------------------------------------------
    QuickPdo::setConnection("mysql:host=localhost;dbname=oui", 'root', 'root', [
//        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY','')), NAMES 'utf8'",
//        PDO::MYSQL_ATTR_INIT_COMMAND => "SET sql_mode=(SELECT REPLACE(@@sql_mode,'STRICT_TRANS_TABLES','')), NAMES 'utf8'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    $b = LingBullSheetGenerator::create()->setDir("/pathto/php/projects/bullsheets-repo/bullsheets");

    function truncate($table)
    {
        QuickPdoDbOperationTool::truncate($table);
    }

    function getImages($dir, $dirRelPath)
    {
        return array_map(function ($v) use ($dirRelPath) {
            return $dirRelPath . "/" . $v;
        }, YorgDirScannerTool::getFilesWithExtension($dir, ['jpg', 'png'], false, false, true));
    }

    $avatars = getImages($avatarDir, "/img/users/avatar");
    $nbAvatars = count($avatars);

    $videoThumbs = getImages($videoThumbsDir, "/img/video");
    $nbVideoThumbs = count($videoThumbs);
    //--------------------------------------------
    // USERS
    //--------------------------------------------
    if ((int)$users > 0) {
        echo "try inserting $users users...<br>";


        function getWebsites($n)
        {
            global $b;

            $a = [];
            for ($i = 0; $i < $n; $i++) {
                $a[] = $b->websiteDomain();
            }
            return implode("\n", $a);
        }


        truncate('users');
        $sexes = ['h', 'f'];

        for ($i = 0; $i < $users; $i++) {


            $paysRes = QuickPdo::fetch("select id from pays order by rand()");
            $niveauxRes = QuickPdo::fetch("select id from niveaux order by rand()");


            $data = [
                "email" => $b->email(),
                "pseudo" => $b->pseudo(),
                "password" => $b->password(),
                "url_photo" => $avatars[rand(0, $nbAvatars - 1)],
                "nom" => $b->getPureData("last_name"),
                "prenom" => $b->getPureData("first_name"),
                "sexe" => $sexes[rand(0, 1)],
                "date_naissance" => $b->dateTimeMysql('1960/01/01', '2002/01/01'),
                "code_postal" => $b->getPureData("zip_code/france"),
                "ville" => $b->getPureData("city/europe/france"),
                "pays_id" => $paysRes['id'],
                "niveaux_id" => $niveauxRes['id'],
                "biographie" => $b->loremSentence(),
                "influences" => $b->loremSentence(),
                "prochains_concerts" => $b->loremSentence(),
                "sites_internet" => getWebsites(rand(0, 4)),
                "active" => "1",
                //
                'newsletter' => "n",
                'show_sexe' => "n",
                'show_date_naissance' => "n",
                'show_niveau' => "n",
            ];


            try {
                $userId = QuickPdo::insert("users", $data);
            } catch (\Exception $e) {
                $i--;
            }

        }
    }


    //--------------------------------------------
    // USERS_HAS_INSTRUMENTS
    //--------------------------------------------
    if ((int)$usersHasInstruments > 0) {
        echo "try inserting $usersHasInstruments users_has_instruments...<br>";


        truncate('users_has_instruments');
        for ($i = 0; $i < $usersHasInstruments; $i++) {
            $userRes = QuickPdo::fetch("select id from users order by rand()");
            $instrumentRes = QuickPdo::fetch("select id from instruments order by rand()");
            try {
                $id = QuickPdo::insert("users_has_instruments", [
                    "users_id" => $userRes['id'],
                    "instruments_id" => $instrumentRes['id'],
                ]);
            } catch (\Exception $e) {
                $i--;
            }
        }
    }


    //--------------------------------------------
    // USERS_HAS_STYLES_MUSICAUX
    //--------------------------------------------
    if ((int)$usersHasStyles > 0) {
        echo "try inserting $usersHasStyles users_has_styles_musicaux...<br>";

        truncate('users_has_styles_musicaux');
        for ($i = 0; $i < $usersHasStyles; $i++) {
            $userRes = QuickPdo::fetch("select id from users order by rand()");
            $styleRes = QuickPdo::fetch("select id from styles_musicaux order by rand()");
            try {
                $id = QuickPdo::insert("users_has_styles_musicaux", [
                    "users_id" => $userRes['id'],
                    "styles_musicaux_id" => $styleRes['id'],
                ]);
            } catch (\Exception $e) {
                $i--;
            }
        }
    }


    //--------------------------------------------
    // VIDEOS
    //--------------------------------------------
    if ((int)$videos > 0) {
        echo "try inserting $videos videos...<br>";


        truncate('videos');

        for ($i = 0; $i < $videos; $i++) {


            $userRes = QuickPdo::fetch("select id from users order by rand()");
            $concoursRes = QuickPdo::fetch("select id from concours order by rand()");

            try {
                $id = QuickPdo::insert("videos", [
                    "active" => "1",
                    "users_id" => $userRes['id'],
                    "concours_id" => $concoursRes['id'],
                    "titre" => substr($b->loremSentence(1, 1), 0, 64),
                    "url" => $b->getPureData("url/youtube"),
                    "url_photo" => $videoThumbs[rand(0, $nbVideoThumbs - 1)],
                    "nb_vues" => rand(0, 10000),
                    "nb_likes" => rand(0, 10000),
                    "date_creation" => $b->dateTimeMysql(),
                ]);
            } catch (\Exception $e) {
                $i--;
            }
        }


        //--------------------------------------------
        // COUPS DE COEUR
        //--------------------------------------------
        if ((int)$coupsDeCoeur > 0) {
            echo "try inserting $coupsDeCoeur coups de coeur...<br>";


            truncate('coups_de_coeur');

            for ($i = 0; $i < $coupsDeCoeur; $i++) {


                $videoRes = QuickPdo::fetch("select id from videos order by rand()");

                try {
                    $id = QuickPdo::insert("coups_de_coeur", [
                        "videos_id" => $videoRes['id'],
                        "position" => $i,
                    ]);
                } catch (\Exception $e) {
                    $i--;
                }
            }
        }

    }


} else {
    echo "notoken";
}