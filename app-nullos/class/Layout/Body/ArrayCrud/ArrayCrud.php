<?php


namespace Layout\Body\ArrayCrud;


use Crud\ArrayDataTable;

class ArrayCrud
{

    public static function demo()
    {
        ?>
        <div class="tac bignose install-page">
            <h3>Articles</h3>
            <p>
                <a href="#">Create a new article</a>
            </p>
        </div>
        <?php

        $arr = [
            [
                "id" => 1,
                "name" => "john",
                "age" => 64,
            ],
            [
                "id" => 2,
                "name" => "mathilda",
                "age" => 12,
            ],
            [
                "id" => 3,
                "name" => "marguerite",
                "age" => 35,
            ],
            [
                "id" => 4,
                "name" => "galileo",
                "age" => 78,
            ],
        ];
        $table = new ArrayDataTable();
        $table->searchColumns = [
            'id',
            'name',
            'age',
        ];
        $table->customizeWidget('newItemLink', false);
        $table->nbItemsPerPage = 2;
        $table->registerSingleAction(
            'delete',
            '<a class="action-link postlink confirmlink" data-action="delete" data-ric="{ric}" href="#">Delete</a>',
            function ($table, $ric) {
                a($ric);
            }
        );
        $table->registerMultipleAction('deleteAll', "Delete all", function ($table, $rics) {
            a($table, $rics);
        }, true);
        $table->printArrayTable($arr, ['id']);

    }
}