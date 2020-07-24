<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail{
    
    public function send($nome, $email, $tel, $mensagem,$file){
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        
        
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'openmaker4.0@gmail.com';                 // SMTP username
            $mail->Password = 'hubinovacao';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->FromName = "Sua Empresa";

            //Recipients
            $mail->setFrom($email, $nome);
            $mail->addAddress('openmaker4.0@gmail.com', 'Admin');     // Add a recipient
            
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Contato site';
            $mail->Body    = $mensagem;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if($file)
                $mail->addAttachment($file['tmp_name'],$file['name']);
                

            $mail->send();
            return true;
        } catch (Exception $e) {            
            return false;        
        }
    }
}
