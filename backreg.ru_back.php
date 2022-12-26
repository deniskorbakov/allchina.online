<?php
error_reporting(E_ERROR);

$email_code = trim($_POST['email_code']);

include_once 'connectionBD.php';

if(strlen($email_code) != 10) {
    echo "Вы полность не вставили код" . header("refresh:3;url=backreg.ru.php");
}
else {

    $sql = "SELECT * FROM `users` WHERE `token` = '$email_code'";
    if($result = $mysql->query($sql)){
        foreach($result as $row) {
            $user_email_code = $row["token"];
            $user_status = $row["status"];
        }
    }

    if($email_code != $user_email_code ) {
        echo "Неверно указан код" . header("refresh:3;url=backreg.ru.php");
    }
    else {
        $user_status = 1;

        $sql2 = "UPDATE `users` SET `status` = '$user_status' WHERE `token` = '$user_email_code'";

        $mysql->query($sql2);
        $mysql->close();

        header("refresh:0;url=aut.php");
    }
}

?>