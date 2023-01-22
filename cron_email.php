<?php

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

include_once 'connectionBD.php';

$sql = "SELECT * FROM `users`";

    if($result = $mysql->query($sql)) {

    foreach($result as $row) {

        $message = "<a href='https://allchina.online'>Переход на страницу</a>";

        $title = "Код подтверждения сайта allchina.online";
        $body = "
        <b>Сообщение:</b><br> {$row["login"]} доброе утро $message
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
            $mail->addAddress($row["email"]);
    
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

    }


}




    
 