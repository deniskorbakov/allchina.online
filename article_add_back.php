<?php

$title = ucfirst($_POST['title_input']);
$description = $_POST['description_input'];
$textarea = $_POST['textarea_input'];
$avtor = $_COOKIE["user"];

include_once 'connectionBD.php';

if(strlen($title) < 5 || strlen($description) < 15 || strlen($textarea) < 25) {
    echo "<h3>Заголовок - минимум 5 симвволов, Описание - минимум 15 символов, Текст - минимум 25 символов </h3>".header("Refresh:5; url=article_add.php");
}
else {
    $mysql->query("INSERT INTO `article` (`title`,`description`,`textarea`,`data_article`,`avtor`) VALUES ('$title','$description','$textarea',NOW(),'$avtor')");
    $mysql->close();

    header("refresh:0;url=article.php");
}

