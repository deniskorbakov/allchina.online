<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="img\icon.png">
    <link rel="stylesheet" href="css\style.css">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Hadear -->
<?php include_once 'header.php' ?>


<script src="https://www.google.com/recaptcha/api.js"></script>

<form action="aut_back.php" method="POST">
<div class="form-group col-md-8 m-2 mx-auto">
    <label for="exampleInputPassword1">Логин</label>
    <input  name="login_input" type="login" class="form-control" id="exampleInputPassword1" placeholder="Введите логин">
    </div>
  <div class="form-group col-md-8 m-2 mx-auto">
  <label for="typepass3">Пароль</label>
    <input name="password_input"type="password" class="form-control" id="typepass3" placeholder="Введите пароль">
    <div class="message text-danger"></div>
    <input type="checkbox" onclick="Toggle3()">
    <small id="emailHelp" class="form-text text-muted">Показать пароль</small>
    
  </div>
  <div class="g-recaptcha col-md-8 m-3 mx-auto" data-sitekey="6Ld7dqAjAAAAAHZQ3SWtTbKQPjgvAMEgkaa0CSHT"></div>
  <div class="col-md-8 m-3 mx-auto">
    <button type="submit" class="btn btn-outline-success">Войти</button>
  </div>
</form>








<?php include_once 'footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script>
    // Change the type of input to password or text
        function Toggle3() {
            var temp = document.getElementById("typepass3");
            if (temp.type === "password") {
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }
        }
</script>


<script>
  const password = document.querySelector('#typepass3');
  const message = document.querySelector('.message');

 password.addEventListener('keyup', function (e) {
     if (e.getModifierState('CapsLock')) {
         message.textContent = 'Включен Caps Lock';
     } else {
         message.textContent = '';
     }
 });


 
</script>

</body>
</html> 