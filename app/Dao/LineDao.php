<?php

namespace App\Dao;
use App\Models\Line;
use App\Utils\Variables;

class LineDao
{
    function all(){
        return Line::get();
    }

    function getLimit($limit){
        return Line::where(Variables::$DELETED_VARIABLE, 0)->limit($limit)->get();
    }

    function get($id){
        return Line::where(Variables::$DELETED_VARIABLE, 0)->where('id', $id)->first();
    }

    /*
    function insert($data){
        return Line::insert($data);
    }

    function update($id, $data){
        return Line::where('id', $id)->update($data);
    }

    function delete($id){
        return Line::where('id', $id)->update([Variables::$DELETED_VARIABLE => 1]);
    }
    */
}