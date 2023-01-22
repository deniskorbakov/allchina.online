<?php
$oldEmail = $_COOKIE["email"];
$newEmail = $_POST['email'];

$login = $_COOKIE["user"];


        include_once 'connectionBD.php';

        $sql = "SELECT * FROM `users` WHERE `login` = '$login'";

        $result = $mysql->query($sql);

        foreach($result as $row) {

        $userEmail= $row["email"]; 

        }

        if($userEmail != $oldEmail) {
            echo "<h3>Вы не зарегистрированы</h3>".header("refresh:3;url=user_account.php");
        }

        if($oldEmail != $newEmail) {

            $mysql->query("UPDATE `users` SET `email` = '$newEmail' WHERE `users`.`login` = '$login'");
            $mysql->close();

            setcookie('email', $newEmail, time() + (10 * 365 * 24 * 60 * 60), "/");

            echo header("refresh:0;url=user_account.php");
        }
        else{
            echo "<h3>Вы ввели старую почту</h3>".header("refresh:3;url=user_account.php");
        }