<!DOCTYPE html>
<head>
<?php
//error_reporting(0);
    
    require_once "functions/functions.php";
    $title = $news["title"];     
    require_once "blocks/head.php";
    $news = getNews(1, $_GET["id"]);
?>
</head>
<body>
    <?php require_once "blocks/header.php" ?>
<!-- Боковая панель -->
<div id="wrapper">
    <div id="leftCol">


    <?php
        //подключение бд(что записано на id) на сайт, все данные из локалхост
        echo '<div id="bigArticle"><img src="/image/'.$news["id"].'.jpg" alt="Статья 1.'.$news["id"].'" title="Статья 1.'.$news[$i]["id"].'">
        <h2>'.$news["title"].'</h2>
        <p>'.$news['full_text'].'</p>
        </div>';
    ?>


    </div>
    <?php require_once "blocks/rightCol.php" ?>
</div>

    <?php require_once "blocks/footer.php" ?>
</body>