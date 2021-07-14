<?php

namespace App\Dao;
use App\Models\User;
use App\Utils\Variables;

class UserDao
{
    function all(){
        return User::where(Variables::$DELETED_VARIABLE, 0)->with('rol')->get();
    }

    function getLimit($limit){
        return User::where(Variables::$DELETED_VARIABLE, 0)->with('rol')->limit($limit)->get();
    }

    function get($id){
        return User::where(Variables::$DELETED_VARIABLE, 0)->with('rol')->where('id', $id)->first();
    }

    function getByEmail($email){
        return User::where(Variables::$DELETED_VARIABLE, 0)->where('correo', $email)->first();
    }

    function getByCode($code) {
        return User::where(Variables::$DELETED_VARIABLE, 0)->where('codigo', $code)->first();
    }

    function insert($data){
        return User::insert($data);
    }

    function update($id, $data){
        return User::where('id', $id)->update($data);
    }

    function updateByVerificationCode($code, $data){
        return User::where('codigo', $code)->update($data);
    }

    function delete($id){
        return User::where('id', $id)->update([Variables::$DELETED_VARIABLE => 1]);
    }

    function deletePermanently($id){
        return User::where('id', $id)->delete([Variables::$DELETED_VARIABLE => 1]);
    }
}