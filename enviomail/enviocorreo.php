
<?php
use PHPMailer\PHPMailer\PHPMailer;
require "../../vendor/autoload.php";
function enviar_correo($correo,  $cuerpo, $nombre = "", $asunto = ""){
    $mail = new PHPMailer();
    $mail->IsSMTP(); 					// telling the class to use SMTP
    $mail->SMTPDebug  = 2;
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "tls";
    $mail->Host       = "smtp.gmail.com";      // SMTP server
    $mail->Port       = 587;                   // SMTP port
    $mail->Username   = "diegoacero.inef@gmail.com";  // username
    $mail->Password   = "Caballo93";            // password
    $mail->SetFrom('user@gmail.com', 'Test');
    $mail->Subject    = $asunto;
    $mail->MsgHTML($cuerpo);
    
    $address = "test@test.com";
    $mail->AddAddress($correo, $nombre);
    if(!$mail->Send()) {
        return $mail->ErrorInfo;
    } else {
        return false;
    }
}
?>