<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Добавление статьи</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="img\icon.png">
    <link rel="stylesheet" href="css\style.css">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Hadear -->
<?php include_once 'header.php' ?>
<form action="article_add_back.php" method="POST">
    <div class="conteiner">
        <h3 class="text-center mt-5">Добавление сатьи</h3>
    </div>

    <div class="form-group col-md-8 m-2 mx-auto">
        <label >Заголовок</label>
        <input name="title_input" type="text" class="form-control" placeholder="Введите Заголовок">
    </div>

    <div class="form-group col-md-8 m-2 mx-auto">
        <label >Описание</label>
        <input name="description_input" type="text" class="form-control" placeholder="Введите Описание">
    </div>

    <div class="form-group col-md-8 m-2 mx-auto">
        <label >Текст статьи</label>
        <textarea name="textarea_input" type="textarea" class="form-control" placeholder="Введите Текст статьи"></textarea>
    </div>

    <div class="form-group col-md-8 m-2 mx-auto">
        <button class=" btn btn-success" type="submit">Отправить</button>
    </div>
</form>

<?php include_once 'footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html> 