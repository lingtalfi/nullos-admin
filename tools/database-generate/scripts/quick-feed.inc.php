<?php



if (isset($token)) {

    require_once __DIR__ . "/QuickFeed.php";


    echo "<h1>QuickFeed</h1>";


    $q = new QuickFeed([
        'dbName' => 'oui',
        'dbUser' => 'root',
        'dbPass' => 'root',
        'dbIsUtf8' => true,
        'feedDir' => __DIR__ . "/../../fixtures/quick-feed",
        'columnSeparator' => '##',
        'config' => [
            'equipe.txt' => [
                'dbColumn' => 'nom',
            ],
            'instruments.txt' => [
                'dbColumn' => 'nom',
            ],
            'membres.txt' => [
                'dbColumn' => ["pseudo", "email", "url_photo"],
            ],
            'pays.txt' => [
                'dbColumn' => 'nom',
            ],
            'styles.txt' => [
                'dbTable' => 'styles_musicaux',
                'dbColumn' => 'nom',
            ],
            'equipe_has_membres.txt' => [
                'dbColumn' => ["equipe_id", "membres_id"],
                'fetchers' => [
                    "equipe_id" => 'equipe::id::nom',
                    "membres_id" => 'membres::id::pseudo',
                ],
            ],
            'concours.txt' => [
                'dbColumn' => ["equipe_id", "titre", "url_photo", "url_video", "date_debut", "date_fin", "lots", "reglement", "description"],
                'fetchers' => [
                    "equipe_id" => 'equipe::id::nom',
                ],
            ],
            'niveaux.txt' => [
                'dbColumn' => 'nom',
            ],
        ],
    ]);
    $q->feed();


} else {
    echo "notoken";
}