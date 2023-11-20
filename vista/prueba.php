<?php
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once("config/secrets.php");


      $mail = new PHPMailer(true);
      $mail->isSMTP();  // Usa SMTP
      $mail->Host = 'smtp.gmail.com'; // Servidor SMTP
      $mail->Port = 587;   // Puerto SMTP
      $mail->SMTPAuth = true;  // Autenticación SMTP
      $mail->Username = 'viauy2023@gmail.com';  // Tu dirección de correo
      $mail->Password = constant('PWD');  // Tu contraseña
      $mail->SMTPSecure ='tls';  // Opciones: NONE, SSL, TLS
      $mail->CharSet = "UTF-8";
      $mail->setFrom('viauy2023@gmail.com', 'ViaUY');
      $mail->addAddress('fismaelcruzlopez@gmail.com', 'Ismael');
      $mail->Subject = 'Prueba';
      $mail->Body = 'hola mundo';
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;
      try {
            $mail->send();
            echo 'El correo se ha enviado correctamente.';
        } catch (Exception $e) {
            echo 'Hubo un error al enviar el correo: ' . $mail->ErrorInfo;
        }
       
 ;?>