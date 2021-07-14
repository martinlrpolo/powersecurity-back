<?php

namespace App\Dao;
use App\Models\Service;
use App\Utils\Variables;

class ServiceDao
{
    function all(){
        return Service::where(Variables::$DELETED_VARIABLE, 0)->get();
    }

    function getLimit($limit){
        return Service::where(Variables::$DELETED_VARIABLE, 0)->limit($limit)->get();
    }

    function get($id){
        return Service::where(Variables::$DELETED_VARIABLE, 0)->where('id', $id)->first();
    }

    function insert($data){
        return Service::insert($data);
    }

    function update($id, $data){
        return Service::where('id', $id)->update($data);
    }

    function delete($id){
        return Service::where('id', $id)->update([Variables::$DELETED_VARIABLE => 1]);
    }
}