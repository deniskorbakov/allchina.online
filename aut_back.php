<?php
error_reporting(E_ERROR);

$login = $_POST['login_input'];
$password = $_POST['password_input'];


include_once 'connectionBD.php';


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





if(strlen($login) <= 5){
    echo "<h3>Введите логин!</h3>" . header("refresh:3;url=aut.php");
}
else if(strlen($password) < 8) {
    echo "<h3>Введите пароль!</h3>". var_dump($password);//header("refresh:3;url=aut.php");
}
else if($error) {
    echo "<h3>Не Заполнена каптча</h3>" . header("refresh:3;url=aut.php");
  }
else{
$sql = "SELECT * FROM `users` WHERE `login` = '$login'";
if($result = $mysql->query($sql)){
    foreach($result as $row) {
    $userlogin = $row["login"];
    $userpassword = $row["password"]; 
    $userstatus = $row["status"];
    }
    if($userstatus != 1) {
        echo "<h3>Ваш аккаунт не подтвержден по почте</h3>".header("refresh:3;url=aut.php");
    }
    else if($login = $userlogin) {
        if(password_verify($password, $userpassword)) {

            setcookie('user', $login, time() + (10 * 365 * 24 * 60 * 60), "/");
            $mysql->close();
            header("Refresh:0; url=user_account.php");
        }
        else {
            echo "<h3>Не правильный пароль</h3>".header("refresh:3;url=aut.php");
        }
    }
    else {
        echo "<h3>Пользователей не найден!</h3>".header("refresh:3;url=aut.php");
    }

}
}

?>



<!-- $query = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
 
//Отправляем запрос в БД (у меня в примере для подключения используется переменная $mysqli, подставьте свою)
$result = mysqli_query($mysql, $query) or die(mysqli_error($mysqli));

 
// подсчитываем сколько получили рядов выборки и записываем в переменную $count
$count = mysqli_num_rows($result);
 


if($login <= 5){
    echo "<h3>Введите логин!</h3>". header("refresh:3;url=aut.php");
}
else if($password < 8) {
    echo "<h3>Введите пароль!</h3>".header("refresh:3;url=aut.php");
}
else{
    if ($count == 0) {

        echo "<h3>Ошибка регистрации! Такого пользователя не существует или неправильно ввели данные</h3".header("Refresh:3; url=aut.php");

    }
    else if ($count == 1) {
        setcookie('user', $login, time() + (10 * 365 * 24 * 60 * 60), "/");
        $mysql->close();
        header("Refresh:0; url=user_account.php");
    }
} -->