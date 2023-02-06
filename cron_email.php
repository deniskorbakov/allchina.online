<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$today = date("Y-m-d H:i:s");

$result = substr($today, 0, 10);

$startDate = "{$result} 00:00";

$endDate = "{$result} 23:59";

include_once 'connectionBD.php';

$sql = "SELECT * FROM `article` WHERE `data_article` BETWEEN '$startDate' AND '$endDate'";
$result = $mysql->query($sql);

$quantityArticle = mysqli_num_rows($result);

$sql = "SELECT * FROM `users`";

    if($result = $mysql->query($sql)) {

    foreach($result as $row) {
        $message = "<a href='https://allchina.online/article.php'>Перейдите для ознакомление с новыми статьями</a>";
        $title = "Новые статьи уже на сайте";
        $body = "
        <b>Сообщение:</b><br> {$row["login"]} кол-во новых статей: $quantityArticle $message
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
            $mail->Host       = 'mail.hosting.reg.ru'; 
            $mail->Username   = 'helper@allchina.online'; 
            $mail->Password   = 'Pisospro322'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
            $mail->setFrom('helper@allchina.online', 'allchina'); 
    
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


    
 