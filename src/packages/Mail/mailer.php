<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'packages/src/Exception.php';
require 'packages/src/PHPMailer.php';
require 'packages/src/SMTP.php';

class Mailer {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function send($to, $subject, $message) {
        // İsteğe Göre Mail Özelleştirilebilir.
        return $this->Main($to, $subject, $message);
    }

    private function Main($to, $subject, $message) {
        $mail = new PHPMailer(true); 

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $this->username;
            $mail->Password = $this->password;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->CharSet = "UTF-8";
            $mail->Port = 587;
            $mail->setLanguage("tr");

            $mail->setFrom($this->username, 'AkOtomotiv MSYS');
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->isHTML(true);
            $mail->Body = $message;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return $mail->ErrorInfo;
        }
    }
}
?>
