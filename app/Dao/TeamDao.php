<?php

namespace App\Dao;
use App\Models\Team;
use App\Utils\Variables;

class TeamDao
{
    function all(){
        return Team::where(Variables::$DELETED_VARIABLE, 0)->get();
    }

    function getLimit($limit){
        return Team::where(Variables::$DELETED_VARIABLE, 0)->limit($limit)->get();
    }

    function get($id){
        return Team::where(Variables::$DELETED_VARIABLE, 0)->where('id', $id)->first();
    }

    function insert($data){
        return Team::insert($data);
    }

    function update($id, $data){
        return Team::where('id', $id)->update($data);
    }

    function delete($id){
        return Team::where('id', $id)->update([Variables::$DELETED_VARIABLE => 1]);
    }
}