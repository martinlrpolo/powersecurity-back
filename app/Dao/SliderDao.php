<?php

namespace App\Dao;
use App\Models\Slider;
use App\Utils\Variables;

class SliderDao
{
    function all(){
        return Slider::where(Variables::$DELETED_VARIABLE, 0)->get();
    }

    function get($id){
        return Slider::where(Variables::$DELETED_VARIABLE, 0)->where('id', $id)->first();
    }

    function insert($data){
        return Slider::insert($data);
    }

    function update($id, $data){
        return Slider::where('id', $id)->update($data);
    }

    function delete($id){
        return Slider::where('id', $id)->update([Variables::$DELETED_VARIABLE => 1]);
    }
}