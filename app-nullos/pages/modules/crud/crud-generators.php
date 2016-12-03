<?php


Layout::create()->setElementFiles([
    'body' => Helper::layoutElementIf("modules/crud/crud-generators.php", "crud.generator.access"),
])->display();


