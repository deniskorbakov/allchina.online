<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Статьи</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="img\icon.png">
    <link rel="stylesheet" href="css\style.css">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Hadear -->
<?php include_once 'header.php' ?>
<?php include_once "connectionBD.php"; ?>

<?php

$id = $_GET['id'];
$query = mysqli_query($mysql,"SELECT * FROM `article` WHERE `id` = '$id'");

if(mysqli_num_rows($query) == 0) {
    echo "Не удалость найти пост".header("Refresh:5; url=article_add.php");
}



      
while ($row = mysqli_fetch_assoc($query)):
    ?>  
        <div class="form-group col-md-8 m-2 mx-auto">
        <h1 class="text-center">Пост - <?=$row['title'];?></h1>
        <article class="alert alert-success">
            <h3><?=$row['description'];?></h3>
            <p style="line-height:1.5; text-align:justify; padding-top:10px;"><?=$row['textarea'];?></p>
            <em>Дата публикации: <?=$row['data_article'];?></em><br>
            <em>Автор: <a href=""><?=$row['avtor'];?></a></em><br>
            <em>Просмотров: <?=$row['view'];?></em><br>
            
        </article>
        </div>
        
        <div class="form-group col-md-8 m-2 mx-auto">
            <a class="btn btn-outline-success" href="article.php">Перейти назад</a>
        </div>
    <?php
        endwhile;
        //добавление просмотров
        $query = mysqli_query($mysql,"UPDATE `article` SET view =  view + 1 WHERE `id` = '$id'");
    ?>


<?php include_once 'footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html> 