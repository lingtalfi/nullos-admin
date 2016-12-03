<?php


IfDbLayout::create()->setElementFiles([
    'body' => Helper::layoutElementIf("modules/crud/crud.php", "crud.access.table"),
])->display();


