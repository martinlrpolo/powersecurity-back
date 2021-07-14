<?php

namespace App\Dao;
use App\Models\MiniSlider;
use App\Utils\Variables;

class MiniSliderDao
{
    function all(){
        return MiniSlider::where(Variables::$DELETED_VARIABLE, 0)->get();
    }

    function get($id){
        return MiniSlider::where(Variables::$DELETED_VARIABLE, 0)->where('id', $id)->first();
    }

    function insert($data){
        return MiniSlider::insert($data);
    }

    function update($id, $data){
        return MiniSlider::where('id', $id)->update($data);
    }

    function delete($id){
        return MiniSlider::where('id', $id)->update([Variables::$DELETED_VARIABLE => 1]);
    }
}