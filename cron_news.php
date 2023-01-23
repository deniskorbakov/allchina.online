<?php

require_once('bin/vendor/autoload.php');
    

    $url = 'https://ria.ru/location_China/';

    $client = new \GuzzleHttp\Client();
    $resp = $client->get($url);
    $html = $resp->getBody()->getContents();

    $document = new \DiDom\Document();
    $document->loadHtml($html);

    $title_1 = $document->find('div.layout-rubric div.list-tags div.list-item div.list-item__content a.color-font-hover-only');

    echo '<br>'; 
    echo '<br>'; 
    foreach($title_1 as $item) {    
        var_dump($title1 = $item->text());
        echo '<br>';

        var_dump($href = $item->attr('href'));
        echo '<br>';

        break;

    }                        
                               

    $url = $href;

    $resp = $client->get($url);
    $html = $resp->getBody()->getContents();

    $document->loadHtml($html);

    $title = $document->find('div.article__text');

    $text = '';

     
    foreach($title as $item) {    
        $text .= $item->text();
        echo '<br>';

    }

$title = ucfirst($title1);
$description = $title;
$textarea = $text;
$avtor = $href;

echo '<br>';

$key = md5($title);

include_once 'connectionBD.php';

$sql = "SELECT * FROM `article` WHERE `key` = '$key' ORDER BY `article`.`id` DESC";

    if($result = $mysql->query($sql)) {

    foreach($result as $row) {
        $articleKey = $row['key'];
    }

    if($articleKey == $key) {
        exit();
    }
    else {
        $mysql->query("INSERT INTO `article` (`title`,`description`,`textarea`,`data_article`,`avtor`,`key`) VALUES ('$title','$description','$textarea',NOW(),'$avtor','$key')");
        $mysql->close();
    }
}


 
