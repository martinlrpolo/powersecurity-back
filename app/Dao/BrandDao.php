<?php

namespace App\Dao;
use App\Models\Brand;
use App\Utils\Variables;

class BrandDao
{
    function all(){
        return Brand::select('Marca')->distinct('Marca')->get();
    }

    function getLimit($limit){
        return Brand::select('Marca')->distinct('Marca')->limit($limit)->get();
    }

    function get($name){
        return Brand::select('Marca')->distinct('Marca')->where('Marca', $name)->get();
    }
    
    function getByLine($line){
        return Brand::select('Marca')->distinct('Marca')->where('CodLinea', $line)->get();
    }

    /*
    function insert($data){
        return Brand::insert($data);
    }

    function update($id, $data){
        return Brand::where('id', $id)->update($data);
    }

    function delete($id){
        return Brand::where('id', $id)->update([Variables::$DELETED_VARIABLE => 1]);
    }
    */
}