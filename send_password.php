<?php

$verify_password = $_POST['old_password_input'];
$password1 = $_POST['password1_input'];
$password2 =$_POST['password2_input'];


$login = $_COOKIE["user"];

$number_password = preg_match('@[0-9]@', $password1);
$uppercase_password = preg_match('@[A-Z]@', $password1);
$lowercase_password = preg_match('@[a-z]@', $password1);
$specialChars_password = preg_match('@[^\w]@', $password1);

if($password1 != $password2) {
    echo "<h3>Не совпадают новые пароли</h3>".header("refresh:3;url=user_account.php");
}
else if(strlen($password1) < 0 || strlen($password1) < 0 || strlen($verify_password) < 0) {
    echo "<h3>Пустые данные</h3>".header("refresh:3;url=user_account.php");
}
else {

    

    if(preg_match('/[А-Я а-яЁё]/u', $password1)) {
      echo "<h3>Пароль - введен не коректно: не должно быть - пробелов, русских символов</h3>" . header("refresh:3;url=reg.php");
    }
    else if(!$number_password || !$uppercase_password || !$lowercase_password || !$specialChars_password) {
      echo "<h3>Пароль - должен содержать по крайней мере одну цифру, одну заглавную букву, одну строчную букву и один специальный символ</h3>". header("refresh:3;url=reg.php");
     }
     else {
        include_once 'connectionBD.php';

        $sql = "SELECT * FROM `users` WHERE `login` = '$login'";
    
        $result = $mysql->query($sql);
    
        foreach($result as $row) {
            
        $userpassword = $row["password"]; 
    
        }
    
        if(password_verify($verify_password, $userpassword)) {
    
            $password1 = password_hash($password1, PASSWORD_BCRYPT, ['cost' => 12,]);
    
            $mysql->query("UPDATE `users` SET `password` = '$password1' WHERE `users`.`login` = '$login'");
            $mysql->close();
            echo header("refresh:0;url=user_account.php");
        }
        else{
            echo "<h3>Вы ввели не правильный старый пароль</h3>".header("refresh:3;url=user_account.php");
        }
     }

}
