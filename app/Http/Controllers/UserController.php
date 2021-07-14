<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\UserDao;
use Illuminate\Support\Facades\Hash;
use App\Utils\Messages;


class UserController extends Controller
{

    public function all(){
    	$dao = new UserDao();
        $res = $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function get($id){
    	$dao = new UserDao();
        $res = $dao -> get($id);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function insert(Request $request){
        $data = array(
            'nombres' => $request['nombres'],
            'correo' => $request['correo'],
            'telefono' => $request['telefono'],
            'clave' => Hash::make( $request['clave'] ),
            'rol' => $request['rol ']
        );

        $dao = new UserDao();
        $res = $dao -> insert($data);
        if($res == true)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function update(Request $request){

        $id = $request['id'];
        $data = array(
            'nombres' => $request['nombres'],
            //'correo' => $request['description'],
            'telefono' => $request['telefono'],
            //'rol' => $request['rol ']
        );
        
        $dao = new UserDao();
        $res = $dao -> update($id, $data);
        if($res == 1){
            $user_info = $dao -> get($request['id']);
            $res = array("user_info" => $user_info, "response_info" => Messages::$MSG_SUCCESS_UPDATE_USER['msg']);
            return response() -> json($res, Messages::$MSG_SUCCESS_UPDATE_USER['code']);
        }else{
            return response() -> json(Messages::$MSG_ERROR_UPDATE_USER['msg'], Messages::$MSG_ERROR_UPDATE_USER['code']);
        }
    }

    public function delete($id){
        $dao = new UserDao();
        $res = $dao -> delete($id);
        if ($res === 1) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }


}