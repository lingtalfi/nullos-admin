<?php





TableConfig::create()
    ->setName('concours')
    ->registerField('id', 'ai')
    ->registerField('equipe_id')
    ->registerField('titre')
    ->registerField('url_photo')
    ->registerField('url_video')
    ->registerField('date_debut')
    ->registerField('date_fin')
    ->registerField('lots')
    ->registerField('reglement')
    ->registerField('description')
;