<?php
namespace App\Services;
use Illuminate\Support\Facades\Mail;
use App\Services\EmailService;
use App\Utils\Variables;
class EmailService
{

    public static function SEND_EMAIL_CHANGE_PASSWORD($data){
        $from = $data["correo"];
        $urlVerify = Variables::$SERVER_FRONT_END_URL . Variables::$VERIFY_PASSWORD_URL . $data['codigo'];

        $html = "
        <div style='border:solid 1px ".Variables::$CORPORATE_COLOR."; color:#2d3e50; text-align:center; padding:10px;'>
            <img src='".Variables::$CORPORATE_LOGO."' width='200' />
            <h1>Bienvenidos: ".$data['nombres']."</h1>
            <hr/>
            <p>Usted ha solicitado un cambio de contraseña</p>
            </br></br>
            <a href='".$urlVerify."' style='cursor:pointer;background: ".Variables::$CORPORATE_COLOR."; width: 50%; border: 0; padding: 7px; color: #FFFFFF; font-size: 14px;'>
                Restablacer Contraseña
            </a>
            </br></br>
            <p>Si no encuentra el botón, puede dar clic en el siguiente enlace de manera directa:</p>
            </br></br>
            <p><a href='".$urlVerify."'>".$urlVerify."</a></p>
        </div>
        ";

        $to = $data['correo'];
        $subject = "Cambio de contraseña " . Variables::$ORGANIZATION_NAME;
        EmailService::SEND_MAIL($from, $to, $html, $subject, null);
    }


    public static function SEND_EMAIL_VERIFY_ACCOUNT($data){
        $from = $data["correo"];
        $urlVerify = Variables::$SERVER_FRONT_END_URL . Variables::$VERIFY_ACCOUNT_URL . $data['codigo'];

        $html = "
        <div style='border:solid 1px ".Variables::$CORPORATE_COLOR."; color:#2d3e50; text-align:center; padding:10px;'>
            <img src='".Variables::$CORPORATE_LOGO."' width='200' />
            <h1>Bienvenidos: ".$data['nombres']."</h1>
            <hr/>
            <p>Usted se ha registrado en nuestro portal web</p>
            </br></br>
            <a href='".$urlVerify."' style='cursor:pointer;background: ".Variables::$CORPORATE_COLOR."; width: 50%; border: 0; padding: 7px; color: #FFFFFF; font-size: 14px;'>
                Activar cuenta
            </a>
            </br></br>
            <p>Si no encuentra el botón, puede dar clic en el siguiente enlace de manera directa:</p>
            </br></br>
            <p><a href='".$urlVerify."'>".$urlVerify."</a></p>
        </div>
        ";

        $to = $data['correo'];
        $subject = "Bienvenido a " . Variables::$ORGANIZATION_NAME;
        EmailService::SEND_MAIL($from, $to, $html, $subject, null);
    }

    public static function SEND_MAIL($from, $to, $html, $subject, $file = null){

        if($file == null){
            Mail::html($html, function($msg) use ($from, $to, $html, $subject) { 
                $msg->to([$to])->subject($subject); 
                $msg->from($from); 
            });
        }else{
            Mail::html($html, function($msg) use ($from, $to, $html, $subject, $file) { 
                $msg->to([$to])->subject($subject); 
                $msg->from($from);
                $msg->attachData(base64_decode($file['base64']), $file['filename'] /*, ['mime' => $file['filetype']]*/ );
            });
        }
        
    }
}