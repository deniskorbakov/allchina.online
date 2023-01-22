<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Форма сброса почты</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.svg">
    <link rel="stylesheet" href="css\style.css">
</head>
<body class="d-flex flex-column min-vh-100">

<?php include_once 'header.php' ?>

<form action="forgot_send_mail.php" method="POST" class="container-fluid mt-5">
    <div class="form-group col-md-8 m-2 mx-auto">
        <label>Введите код который пришел вам на почту</label>
        <input name="code" type="text" class="form-control mt-2" id="code" placeholder="Введите код">
    </div>

    <div class="form-group col-md-8 m-3 mx-auto">
        <button type="submit" class="btn btn-success">Отправить</button>
    </div>
</form>
<?php
$code = $_POST['code'];

var_dump($code);
?>

<?php include_once 'footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html> 