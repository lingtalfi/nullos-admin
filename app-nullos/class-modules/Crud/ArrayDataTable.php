<?php

namespace Crud;


class ArrayDataTable extends DataTable
{
    private $_array;

    public function __construct()
    {
        parent::__construct();
    }

    public function printArrayTable(array $array, array $ric)
    {
        $this->_array = $array;
        $this->_printTable($ric);
    }

    public function updateArray(array $arr)
    {
        $this->_array = $arr;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function getNbItems($search)
    {
        $arr = $this->_array;
        if ('' !== $search) {
            $arr = $this->applySearch($arr, $search);
        }
        $this->_array = $arr;
        return count($arr);
    }

    protected function getItems($sortColumn, $sortColumnDir, $nbItemsPerPageChoice, $currentPage)
    {
        $arr = $this->_array;
        if (null !== $sortColumn) {
            if ('asc' === $sortColumnDir) {
                usort($arr, function ($item1, $item2) use ($sortColumn) {
                    return $item1[$sortColumn] > $item2[$sortColumn];
                });
            } else {
                usort($arr, function ($item1, $item2) use ($sortColumn) {
                    return $item1[$sortColumn] < $item2[$sortColumn];
                });
            }
        }

        $offset = ($currentPage - 1) * $nbItemsPerPageChoice;
        $ret = array_slice($arr, $offset, $nbItemsPerPageChoice);
        return $ret;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function applySearch(array $arr, $search)
    {
        $ret = [];
        if (null === $this->searchColumns) {
            if (array_key_exists(0, $arr)) {
                $searchColumns = array_keys($arr[0]);
            }
        } else {
            $searchColumns = $this->searchColumns;
        }


        if (count($searchColumns) > 0) {
            foreach ($arr as $item) {
                foreach ($searchColumns as $col) {
                    if (false !== stripos($item[$col], $search)) {
                        $ret[] = $item;
                        break;
                    }
                }
            }

        } else {
            $ret = $arr;
        }
        return $ret;
    }

}