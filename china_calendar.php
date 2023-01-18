<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Подробная таблица (календарь) которая включает все года животных по Китайскому гороскопу. Можно смотреть онлайн">
    <title>Китайский календарь - перевод в китайский календарь,стихия года</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.svg">
    <link rel="stylesheet" href="css\style.css">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Hadear -->
<?php include_once 'header.php' ?>

<div class="container mt-5">
    <h3>Введите год чтоб превести его по китайскому календарю</h1>
</div>
<br>
<div class="container">
<form action="" method="post">
<input name="years"class="form-control form-control-lg" type="text" placeholder="Введите год">
<br>
<button type="submit" class="btn btn-outline-success">Получить результат</button>
</form>
</div>

<div class="container">
<p class="font-weight-bold">
<br>
<?php
error_reporting(E_ERROR);
$input_number = $_POST['years'];

$number_verify = preg_match('@[0-9]@', $input_number);
$specialChars_verify = preg_match('@[^\w]@', $input_number);

if(strlen($input_number) != 4 || !$number_verify || $specialChars_verify) {
    echo '<div class="alert alert-success" role="alert">Вы не ввели данные либо введнный год не коректный!</h3></div>';
}
else {
    $elements = 
        [1=>'Дерево',2=>'Дерево',3=>'Огонь',
            4=>'Огонь',5=>'Земля',6=>'Земля',
                7=>'Металл',8=>'Метал',9=>'Вода',0=>'Вода'];

    $animals = 
        [1 =>'Крыса', 2 => 'Бык', 3 => 'Тигр', 4 => 'Кролик (Кот)', 
            5 => 'Дракон', 6 => 'Змея', 7 =>'Лошадь', 8 =>'Овца (Коза)', 
                9 => 'Обезьяна', 10 => 'Петух', 11 => 'Собака', 0 =>  'Свинья (Кабан)'];

    $first_division = 2397;
    $chinese_cycle = 60;
    $animal_cycle = 12;


    $sum_year = $input_number + $first_division;
    $years = floor($sum_year / $chinese_cycle);

    $minus_year = $years * $chinese_cycle;
    $result = $sum_year - $minus_year;

    $result_str = "$result";
    $result_str = $result_str[strlen($result_str)-1];

    //CТИХИЯ НАШЕГО ГОДА
    $elements_result = $elements[$result_str];

    $animal_search = floor($result / $animal_cycle) * $animal_cycle;
    //ЖИВОТНОЕ НАШЕГО ГОДА
    $animal_result = $animals[$result - $animal_search];
    
    echo 

    "<h4>Введенный год: $input_number</h4>
    <h4>Cтихия года: $elements_result</h4>
    <h4>Животное года: $animal_result</h4>";

}


?>
</p>
</div>





<?php include_once 'footer.php' ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html> 