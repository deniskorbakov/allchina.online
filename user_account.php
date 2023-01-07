<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Кабинет пользователя</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.svg">
    <link rel="stylesheet" href="css\style.css">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Hadear -->
<?php include_once 'header.php' ?>

<div class="container">
    <h3>Пользователь: <?php
    echo $_COOKIE["user"];
    ?></h3>

    <h3>Почта: <?php
    echo $_COOKIE["email"];
    ?></h3>
</div>

<div class="container">
    <a href="article_add.php" class="nav-link px-8 link-secondary fw-bolder mt-5"><h3>Создать статью</h3></a>
</div>

<div class="container">
    <a href="№" class="nav-link px-8 link-secondary fw-bolder mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><h3>Обратная связь</h3></a>

<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Форма обратной связи</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <form action="send_mail.php" method="post">
                            <div class="form-group col-md-8 m-2 mx-auto">
                                <label >Кратко опишите проблема</label>
                                <input name="title_input" type="text" class="form-control" placeholder="Введите Текст">
                            </div>
        
                            <div class="form-group col-md-8 m-2 mx-auto">
                                <label >Опишите проблему в деталях</label>
                                <textarea name="textarea_input" type="textarea" class="form-control" placeholder="Введите Текст"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Выйти</button>
                                <button type="submit" class="btn btn-success">Отправить</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>


<form action="exit.php" method="POST">
<div class="container mt-3">
    <input type="submit" name="appetizer_button" value="Выйти" class="btn btn-outline-danger">
</div>
</form>

<?php include_once 'footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html> 