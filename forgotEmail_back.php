<?php
$newEmail = $_POST['newEmail'];
$oldEmail = $_COOKIE["email"];

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

include_once 'connectionBD.php';

if(strlen($newEmail) < 10) {
    echo "<h3>Не полный адрес почты!</h3>".header("refresh:3;url=forgotEmail.php");
  }


$sql = "SELECT * FROM `users` WHERE `email` = '$oldEmail'";
if($result = $mysql->query($sql)){
        foreach($result as $row) {
        $userEmail = $row["email"];
        }

    if($userEmail != $newEmail) {
        
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = substr(str_shuffle($permitted_chars), 0, 10);

        
        $message = "<a href='https://allchina.online/forgotEmail.php'>Переход на страницу</a>";

            $title = "Код подтверждения сайта allchina.online";
            $body = "
            <b>Сообщение:</b><br> Ваш код подтверждения: $token перейдите по ссылке чтоб cбросить потчу - $message
            ";

            // Настройки PHPMailer
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            try {
                $mail->isSMTP();   
                $mail->CharSet = "UTF-8";
                $mail->SMTPAuth   = true;
                //$mail->SMTPDebug = 2;
                $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

                // Настройки вашей почты
                $mail->Host       = 'smtp.mail.ru'; 
                $mail->Username   = 'helper-allchina@mail.ru'; 
                $mail->Password   = 'a1QC4Yyve0eSsVQBi6xB'; 
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = 465;
                $mail->setFrom('helper-allchina@mail.ru', 'allchina'); 

                // Получатель письма
                $mail->addAddress($newEmail);

            // Отправка сообщения
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = $body;    

            // Проверяем отравленность сообщения
            if ($mail->send()) {$result = "success";} 
            else {$result = "error";}

            } catch (Exception $e) {
                $result = "error";
                $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
            }

            header("refresh:0;url=forgot_send_mail.php");

    }
    else {
        echo "<h3>Введите новый адрес</h3>" . header("refresh:3;url=forgotEmail.php");
    }
}

?> 