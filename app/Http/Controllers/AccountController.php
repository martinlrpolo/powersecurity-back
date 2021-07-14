<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\UserDao;
use App\Services\CaptchaService;
use Illuminate\Support\Facades\Hash;
use App\Utils\Messages;
use App\Utils\Methods;
use App\Services\EmailService;

class AccountController extends Controller
{

    public function register(Request $request){

        /*
        $recaptcha = CaptchaService::VALIDATE($request['recaptcha']);
        if($recaptcha === false) {
            return response() -> json(Messages::$MSG_ERROR_ACCOUNT_REGISTER_CAPTCHA['msg'], Messages::$MSG_ERROR_ACCOUNT_REGISTER_CAPTCHA['code']);
        }
        */

        $data = array(
            'nombres' => $request['nombres'],
            'correo' => $request['correo'],
            'telefono' => $request['telefono'],
            'clave' => Hash::make( $request['clave'] ),
            'codigo' => Methods::GENERATE_RANDOM_STRING(),
            'rol' => $request['rol']
        );

        $dao = new UserDao();
        $res = $dao -> insert($data);
        if($res == true){
            $user_inserted_info = $dao -> getByEmail($request['correo']);
            $res = array("user_info" => $user_inserted_info, "response_info" => Messages::$MSG_RESPONSE_ACCOUNT_REGISTER['msg']);
            try {
                EmailService::SEND_EMAIL_VERIFY_ACCOUNT($user_inserted_info);
                return response() -> json($res, Messages::$MSG_RESPONSE_ACCOUNT_REGISTER['code']);
            } catch (\Throwable $th) {
                $dao->deletePermanently($user['id']);
                return response() -> json(Messages::$MSG_ERROR_ACCOUNT_REGISTER['msg'], Messages::$MSG_ERROR_ACCOUNT_REGISTER['code']);
            }
        }else{
            return response() -> json(Messages::$MSG_ERROR_ACCOUNT_REGISTER['msg'], Messages::$MSG_ERROR_ACCOUNT_REGISTER['code']);
        }
    }

    public function login(Request $request){
        /*
        $recaptcha = CaptchaService::VALIDATE($request['recaptcha']);
        if($recaptcha === false) {
            return response() -> json(Messages::$MSG_ERROR_ACCOUNT_REGISTER_CAPTCHA['msg'], Messages::$MSG_ERROR_ACCOUNT_REGISTER_CAPTCHA['code']);
        }
        */

        $dao = new UserDao();
        $email = $request['correo'];
        $user = $dao -> getByEmail($email);
        $hashedPassword = $user -> clave;

        if (Hash::check($request['clave'], $hashedPassword)) {
            $res = array("user_info" => $user, "response_info" => Messages::$MSG_SUCCESS_USER_VALID_USER['msg']);
            return response() -> json($res, Messages::$MSG_SUCCESS_USER_VALID_USER['code']);
        }else{
            return response() -> json(Messages::$MSG_ERROR_ACCOUNT_INVALID_USER['msg'], Messages::$MSG_ERROR_ACCOUNT_INVALID_USER['code']);
        }
    }

    public function verify(Request $request){
        $data = array(
            'activo' => 1,
        );
        $dao = new UserDao();
        $user = $dao -> getByCode($request['codigo']);

        if(!empty($user)) {
            $res = $dao -> updateByVerificationCode($request['codigo'], $data);
            if($res == true){
                return response() -> json(Messages::$MSG_SUCCESS_USER_CONFIRMED['msg'], Messages::$MSG_SUCCESS_USER_CONFIRMED['code']);
            }else{
                return response() -> json(Messages::$MSG_ERROR_ACCOUNT_REGISTER['msg'], Messages::$MSG_ERROR_ACCOUNT_REGISTER['code']);
            }
        }else{
            return response() -> json(Messages::$MSG_ERROR_ACCOUNT_REGISTER['msg'], Messages::$MSG_ERROR_ACCOUNT_REGISTER['code']); 
        }
    }   

    public function verifyPassword(Request $request){
        $data = array(
            'codigo' => Methods::GENERATE_RANDOM_STRING(),
            'clave' => Hash::make( $request['clave'] )
        );
        $dao = new UserDao();
        $res = $dao->updateByVerificationCode($request['codigo'], $data);
        if($res == true){
            return response() -> json(Messages::$MSG_SUCCESS_CHANGED_PASSWORD['msg'], Messages::$MSG_SUCCESS_CHANGED_PASSWORD['code']);
        }else{
            return response() -> json(Messages::$MSG_ERROR_EMAIL_CHANGE_PASSWORD['msg'], Messages::$MSG_ERROR_EMAIL_CHANGE_PASSWORD['code']);
        }
    }

    public function changePassword(Request $request) {
        $dao = new UserDao();
        $user = $dao -> getByEmail($request['correo']);
        if(!empty($user)) {
            try {
                EmailService::SEND_EMAIL_CHANGE_PASSWORD($user);
                return response() -> json(Messages::$MSG_SUCCESS_EMAIL_CHANGE_PASSWORD['msg'], Messages::$MSG_SUCCESS_EMAIL_CHANGE_PASSWORD['code']);
            } catch (\Throwable $th) {
                return response() -> json(Messages::$MSG_ERROR_EMAIL_CHANGE_PASSWORD['msg'], Messages::$MSG_ERROR_EMAIL_CHANGE_PASSWORD['code']);
            }
        }else{
            return response() -> json(Messages::$MSG_ERROR_EMAIL_CHANGE_PASSWORD_NOT_FOUND['msg'], Messages::$MSG_ERROR_EMAIL_CHANGE_PASSWORD_NOT_FOUND['code']);
        }
    }

}