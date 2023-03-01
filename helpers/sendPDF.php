<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



function sendPdf($userMail, $filePath)
{
      //Enviar correo
      //Llamando a los archivos necesarios para PhpMailer
      require '../Phpmailer/Exception.php';
      require '../Phpmailer/PHPMailer.php';
      require '../Phpmailer/SMTP.php';

      try {
            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->CharSet = 'utf-8';
            $mail->SMTPDebug = 0;
            $mail->SMTPSecure = 'tls';

            $mail->SMTPAuth = 'true';
            // Enables SMTP authentication.

            $mail->Host = "smtp.gmail.com";
            // SMTP server host.
            $mail->Port = 587;
            // Setting the SMTP port for the GMAIL server.

            //Usuario con contraseña autorizada por gmail
            $mail->Username = "pepeshoes01lis@gmail.com";
            // SMTP account username (GMail email address).
            $mail->Password = 'ztxxaurpsyvgxrco';
            // Contraseña creada a partir de google,
            // para permisos de aplicacion

            //Envio de mensaje
            $mail->SetFrom('pepeshoes01lis@gmail.com', 'Textil Export');
            // De quien - match the GMail email.
            $mail->AddAddress($userMail, 'Someone Else');
            // Para email / name.

            //Mensaje
            $mail->Subject = 'Cotización de productos';
            $mail->Body = 'Se adjunta la cotización de los productos realizado el día de hoy.';
            $mail->addAttachment($filePath);
            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

            //Para enviar
            $mail->send();
      } catch (Exception $e) {
      }
}
