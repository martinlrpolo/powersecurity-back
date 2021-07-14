<?php

namespace App\Dao;
use App\Models\Product;
use App\Utils\Variables;

class ProductDao
{
    function get($clientType, $line, $brand) {
        return  app('db')->connection(Variables::$AWS_MYSQL_DATABASE)->select("CALL listaprecios(".$clientType.", ".$line.", ".$brand.");");
    }

    function getByCode($clientType, $code) {
        return  app('db')->connection(Variables::$AWS_MYSQL_DATABASE)->select("CALL precioxcodigo('".$clientType."', '".$code."')");
    }
}