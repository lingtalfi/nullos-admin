<?php



Layout::create()->setElementFiles([
    'body' => Helper::layoutElementIf("modules/crud/crud.php", "crud.access"),
])->display();


