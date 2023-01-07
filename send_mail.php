<?php
error_reporting(E_ERROR);

$subject = $_POST['title_input'];
$body = $_POST['textarea_input'];
$email_from = $_COOKIE["email"];
$name_from = $_COOKIE["user"];

$email_to = 'helper-allchina@mail.ru';
$name_to = $email_to;

$send_charset = 'utf8';
$data_charset = 'utf8';


if(strlen($subject) < 5) {
    echo "<h3>Минимальная длинна описания 5 символов</h3>" . header("refresh:3;url=user_account.php");
}
else if(strlen($body) < 10) {
    echo "<h3>Минимальная длинна текста 10 символов</h3>" . header("refresh:3;url=user_account.php");
}
else{
    
    function send_mime_mail($name_from, // имя отправителя
        $email_from, // email отправителя
        $name_to, // имя получателя
        $email_to, // email получателя
        $data_charset, // кодировка переданных данных
        $send_charset, // кодировка письма
        $subject, // тема письма
        $body // текст письма
    ) {
    $to = mime_header_encode($name_to, $data_charset, $send_charset)
    . ' <' . $email_to . '>';
    $subject = mime_header_encode($subject, $data_charset, $send_charset);
    $fromrn =  mime_header_encode($name_from, $data_charset, $send_charset)
    .' <' . $email_from . '>';
    if($data_charset != $send_charset) {
    $body = iconv($data_charset, $send_charset, $body);
    }
    $headers = "From: $fromrn";
    $headers .= "Content-type: text/plain; charset=$send_charset";

    return mail($to, $subject, $body, $headers);
    }

    function mime_header_encode($str, $data_charset, $send_charset) {
    if($data_charset != $send_charset) {
    $str = iconv($data_charset, $send_charset, $str);
    }
    return '=?' . $send_charset . '?B?' . base64_encode($str) . '?=';
    }

    send_mime_mail($name_from,
        $email_from,
        $name_to,
        $email_to,
        $data_charset,  // кодировка, в которой находятся передаваемые строки
        $send_charset, // кодировка, в которой будет отправлено письмо
        $subject,
        $body
    );
    header("refresh:0;url=user_account.php");

}
