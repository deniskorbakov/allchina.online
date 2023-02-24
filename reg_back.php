<?php
error_reporting(E_ERROR);

//input data
$login = $_POST['login_input'];
$email = $_POST['email_input'];
$password = $_POST['password_input'];
$password2 = $_POST['password_input2'];

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';



include_once 'connectionBD.php';

//составляем запрос к БД
$query = "SELECT * FROM users WHERE login='$login'";
 
//Отправляем запрос в БД (у меня в примере для подключения используется переменная $mysqli, подставьте свою)
$result = mysqli_query($mysql, $query) or die(mysqli_error($mysql));
 
// подсчитываем сколько получили рядов выборки и записываем в переменную $count
$count = mysqli_num_rows($result);




$query2 = "SELECT * FROM `users` WHERE `email`='$email'";
 
//Отправляем запрос в БД (у меня в примере для подключения используется переменная $mysqli, подставьте свою)
$result2 = mysqli_query($mysql, $query2) or die(mysqli_error($mysql));
 
// подсчитываем сколько получили рядов выборки и записываем в переменную $count
$count2 = mysqli_num_rows($result2);
 
//проверка каптчи
$error = true;
$secret = '6Ld7dqAjAAAAAGuTiS78hfxbLeJTwXzKjrQ5R-Mf';
 
if (!empty($_POST['g-recaptcha-response'])) {
	$curl = curl_init('https://www.google.com/recaptcha/api/siteverify');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
	$out = curl_exec($curl);
	curl_close($curl);
	
	$out = json_decode($out);
	if ($out->success == true) {
		$error = false;
	} 
}    


//проверка сложности пароля
$number_password = preg_match('@[0-9]@', $password);
$uppercase_password = preg_match('@[A-Z]@', $password);
$lowercase_password = preg_match('@[a-z]@', $password);
$specialChars_password = preg_match('@[^\w]@', $password);



//проверка правильности данных
if(preg_match('/[А-Я а-яЁё.,]/u', $login)) {
  echo "<h3>Логин - введен не коректно: не должно быть - пробелов, русских символов, точек, запятых</h3>" . header("refresh:3;url=reg.php");
}
else if(preg_match('/[А-Я а-яЁё]/u', $password)) {
    echo "<h3>Пароль - введен не коректно: не должно быть - пробелов, русских символов</h3>" . header("refresh:3;url=reg.php");
  }
else if(!$number_password || !$uppercase_password || !$lowercase_password || !$specialChars_password) {
    echo "<h3>Пароль - должен содержать по крайней мере одну цифру, одну заглавную букву, одну строчную букву и один специальный символ</h3>". header("refresh:3;url=reg.php");
   }
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<h3>Вы ввели не коректный адрес почты</h3>" . header("refresh:3;url=reg.php");
}
else {

  
//проверка на пустоту и введенных данных
if(strlen($login) <= 5 || strlen($login) > 15) {
  echo "<h3>Короткий логин длинна должна быть больше 5 символов и не больше 15 символов!!</h3>" . header("refresh:3;url=reg.php");
}
else if(strlen($password) < 8 || strlen($password) > 20) {
  echo "<h3>Короткий пароль, должен быть не менее 8 символов и не больше 20 символов!</h3>".header("Refresh:3; url=reg.php");
}
else if(strlen($email) < 10) {
  echo "<h3>Не полный адрес почты!</h3>".header("Refresh:3; url=reg.php");
}
else if($password != $password2) {
  echo "<h3>Пароли не совпадают</h3>".header("Refresh:3; url=reg.php");
}
else if($login == $password) {
  echo "<h3>Логин и пароль не должны совпадать</h3>".header("Refresh:3; url=reg.php");
}
else if($password == $email) {
  echo "<h3>Пароль и почта не должны совпадать</h3>".header("Refresh:3; url=reg.php");
}
else {
  if ( $_POST['checkbox'] == '') {
    echo "<h3>Вы не согласились c соглашеним пользователя!</h3>".header("Refresh:3; url=reg.php");
  }
  else {
    if ($count !=0) {
      echo "<h3>Ошибка регистрации! Такой логин уже существет!</h3>".header("Refresh:3; url=reg.php");
      
  }
  else if($count2 != 0) {
    echo "<h3>Ошибка регистрации! Такая почта уже существет!</h3>".header("Refresh:3; url=reg.php");
  }
  else if($error) {
    echo "<h3>Не Заполнена каптча</h3>" . header("refresh:3;url=reg.php");
  }
  else{
    $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12,]);

    $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $token = substr(str_shuffle($permitted_chars), 0, 10);

    $message = "<a href='https://allchina.online/backreg.ru.php'>Переход на страницу</a>";

    $title = "Код подтверждения сайта allchina.online";
    $body = "
    <b>Сообщение:</b><br> Ваш код подтверждения: $token перейдите по ссылке чтоб подтвердить потчу - $message
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
        $mail->Password   = 'pW3xA1sW2atZ9qD0'; 
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('helper@allchina.online', 'allchina'); 

        // Получатель письма
        $mail->addAddress($email);

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

    $status = 0;

    $mysql->query("INSERT INTO `users` (`login`,`email`,`password`,`token`,`status`) VALUES ('$login','$email','$password','$token','$status')");
    $mysql->close();

    setcookie('email', $email, time() + (10 * 365 * 24 * 60 * 60), "/");

    header("Refresh:0; url=backreg.ru.php");
  }
  
  }
}

}




?>