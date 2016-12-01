<?php


if (isset($token)) {

    require_once __DIR__ . "/../../init.php"; // url function


    require_once __DIR__ . "/QuickFeed.php";


    echo "<h1>QuickFeed After</h1>";


    $q = new QuickFeed([
        'dbName' => 'oui',
        'dbUser' => 'root',
        'dbPass' => 'root',
        'dbIsUtf8' => true,
        'truncateTableBeforeStart' => false,
        'feedDir' => __DIR__ . "/../../fixtures/quick-feed",
        'columnSeparator' => '##',
        'config' => [
            'users.txt' => [
                'dbColumn' => ["email", "pseudo", "password"],
                'defaults' => [
                    'active' => 1,
                    'url_photo' => url('/img/site/default-user.jpg'),
                    'nom' => '',
                    'prenom' => '',
                    'sexe' => 'h',
                    'date_naissance' => null,
                    'code_postal' => "",
                    'ville' => "",
                    'pays_id' => null,
                    'niveaux_id' => null,
                    'biographie' => "",
                    'influences' => "",
                    'prochains_concerts' => "",
                    'sites_internet' => "",
                    'newsletter' => "n",
                    'show_sexe' => "n",
                    'show_date_naissance' => "n",
                    'show_niveau' => "n",
                ],
            ],
        ],
    ]);
    $q->feed();


} else {
    echo "notoken";
}