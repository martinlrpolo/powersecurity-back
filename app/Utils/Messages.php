<?php
namespace App\Utils;

class Messages{

    /** Acount */
    public static $MSG_RESPONSE_ACCOUNT_REGISTER = array("code" => 201, "msg" => "Usuario registrado correctamente, por favor revisar la bandeja de su correo electrónico para verificar la cuenta");
    public static $MSG_SUCCESS_USER_CONFIRMED = array("code" => 200, "msg" => "Usuario verificado correctamente, por favor ingresar");
    public static $MSG_SUCCESS_USER_VALID_USER = array("code" => 200, "msg" => "Bievenido");
    public static $MSG_SUCCESS_EMAIL_CHANGE_PASSWORD = array("code" => 200, "msg" => "Verificar su correo electrónico, donde se envío un link para restablecer su clave.");
    public static $MSG_SUCCESS_CHANGED_PASSWORD = array("code" => 200, "msg" => "Si clave ha sido modificada exitosamente, por favor iniciar sesión");

    public static $MSG_ERROR_EMAIL_CHANGE_PASSWORD = array("code" => 400, "msg" => "Error al cambiar su contraseña, intentar de nuevo.");
    public static $MSG_ERROR_EMAIL_CHANGE_PASSWORD_NOT_FOUND = array("code" => 400, "msg" => "El correo registrado no existe");
    public static $MSG_ERROR_ACCOUNT_REGISTER_CAPTCHA = array("code" => 400, "msg" => "Captcha se vencio");
    public static $MSG_ERROR_ACCOUNT_REGISTER = array("code" => 400, "msg" => "Error al registrar el usuario");
    public static $MSG_ERROR_ACCOUNT_INVALID_USER = array("code" => 401, "msg" => "Verificar credenciales de acceso");

    /** User */
    public static $MSG_SUCCESS_UPDATE_USER = array("code" => 200, "msg" => "Información editada exitosamente");

    public static $MSG_ERROR_UPDATE_USER = array("code" => 400, "msg" => "No hay información para actualizar");

}


?>