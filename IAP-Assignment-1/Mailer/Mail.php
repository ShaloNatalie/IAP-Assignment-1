<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail {
    public function Send_Mail($config, $mailCnt) {
        $mail = new PHPMailer(true);

        try {
            
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host       = $config['smtp.gmail.com']; 
            $mail->SMTPAuth   = true;
            $mail->Username   = $config['natalie.shalo@strathmore.edu'];
            $mail->Password   = $config['gmfu zvam lmlp hefe'];
            $mail->SMTPSecure = $config['ssl'];
            $mail->Port       = $config[465];

            
            $mail->setFrom($mailCnt['nananatalie36@gmail.com'], $mailCnt['Natalie Nana']);
            $mail->addAddress($mailCnt['neso8966@gmail.com'], $mailCnt['Neso']);

            //Content
            $mail->isHTML(true);
            $mail->Subject = $mailCnt['HELLO!!!'];
            $mail->Body    = $mailCnt['WELCOME TO THE TASK APP!'];

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}