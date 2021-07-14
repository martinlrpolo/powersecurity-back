<?php

namespace App\Dao;
use App\Models\Catalogue;
use App\Utils\Variables;

class CatalogueDao
{
    function all(){
        return Catalogue::where(Variables::$DELETED_VARIABLE, 0)->get();
    }

    function getLimit($limit){
        return Catalogue::where(Variables::$DELETED_VARIABLE, 0)->limit($limit)->get();
    }

    function get($id){
        return Catalogue::where(Variables::$DELETED_VARIABLE, 0)->where('id', $id)->first();
    }

    function insert($data){
        return Catalogue::insert($data);
    }

    function update($id, $data){
        return Catalogue::where('id', $id)->update($data);
    }

    function delete($id){
        return Catalogue::where('id', $id)->update([Variables::$DELETED_VARIABLE => 1]);
    }
}