<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Купить китайский чай - 42 предложения - низкие цены, разный вид чая, вы можете найти чай - черный, зеленый, красный">
    <title>Китайский чай - ассортимент китайского чая, черный, красный, зеленый</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="img\favicon.svg">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Hadear -->
<?php


 include_once 'header.php' ?>

<?php
    require_once('bin/vendor/autoload.php');
    

    $url = 'https://101tea.ru/catalog/?q=китайский%20чай';

    $client = new \GuzzleHttp\Client();
    $resp = $client->get($url);
    $html = $resp->getBody()->getContents();

    $document = new \DiDom\Document();
    $document->loadHtml($html);

    $catalog = $document->find('main.catalog-content div.catalog-content__body-col div.product-card');

    $urlTea = 'https://101tea.ru/';

    ?>

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            
            <?php
            foreach($catalog as $item):
            ?>      
                    <div class="col" style="height: 450px;">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" src="img/tea2.jpg">
                            <div class="card-body" style="height: 160px;">
                                <p class="card-text" style="height: 70px;"><?=$item->find('a')[0]->attr('title');?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    
                                        <em class="text-center mt-2">Цена: <?=$item->first('span.js-price-val')->text();?>₽</em>
                                        <a class="btn btn-outline-success mt-2" href="
                                        <?=
                                            $result = $urlTea,$item->find('a')[0]->attr('href');
                                            $result = mb_substr($result,7);
                                        
                                        ?>">Перейти</a>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                                    
            <?php
                endforeach;
            ?>

                
            
        </div>
    </div>
</div>               

        
<?php include_once 'footer.php' ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

