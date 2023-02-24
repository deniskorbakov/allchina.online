<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Китай, статьи, информация">
    <meta name="description" content="Китай – статьи и полезная информация, которые помогут узнать новое и спланировать путешествие">
    <title>Статьи - статьи про китай, культуру, историю, красоты, опыт</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.svg">
    <link rel="stylesheet" href="css\style.css">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Hadear -->
<?php include_once 'header.php' ?>


<?php 

include_once "connectionBD.php";

if (isset($_GET['page'])){
    $page = $_GET['page'];
 }else $page = 1;

$kol = 10;
$art = ($page * $kol) - $kol;

if (isset($_GET['page'])){
    $page = $_GET['page'];
 }else $page = 1;

$res = mysqli_query($mysql,"SELECT COUNT(*) FROM `article`");
$all = $res;
$row = mysqli_fetch_row($res);
$total = $row[0];

$str_pag = ceil($total / $kol);

$query = mysqli_query($mysql, "SELECT * FROM article ORDER BY `id` DESC LIMIT $art,$kol");

while ($row = mysqli_fetch_assoc($query)):
    ?>  

        <div class="form-group col-md-8 m-2 mx-auto mt-5">
        <h1 class="text-center">Cтатья - <?=$row['title'];?></h1>
        <div class="container">
        <article class="alert alert-success mt-3" role="alert">
            <div class="container">
                <h3><?=$row['description'];?></h3>
                <em>Дата публикации: <?=$row['data_article'];?></em><br>
                <em>Автор: <a href="<?=$row['avtor'];?>">Перейти к автору</a></em><br>
                <a class="btn btn-success mt-3" href="article_view.php?id=<?=$row['id'];?>">Перейти к прочтению</a>
            </div>
        </article>
        </div>
        </div>
    <?php
        endwhile;
    ?>

<div class="form-group col-md-8 m-2 mx-auto">
    <div class="position-relative mt-5">
        <div class="position-absolute bottom-0 end-0">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                        for ($i = 1; $i <= $str_pag; $i++){
                            if($i < 6) {
                                echo "<li class=page-item><a class=page-link href=article.php?page=".$i.">".$i."</a></li>";
                            }
                            $lastPage++;
                        }
                        echo "<li class=page-item><a class=page-link>...</a></li>";
                        echo "<li class=page-item><a class=page-link href=article.php?page=".$lastPage.">".$str_pag."</a></li>";
                    ?>
                    
                </ul>
            </nav>
        </div>
    </div>
</div>




<?php include_once 'footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html> 