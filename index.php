<?php
    //error_reporting(0);
    //стрда ен бырыншы туру керек
    require_once "functions/functions.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        $title = "IT Companies";     
        require_once "blocks/head.php";
        $news = getNews(3);
    ?>
</head>
<body>
    <?php require_once "blocks/header.php" ?>
    <!-- Боковая панель -->
    <div id="wrapper">
        <div id="leftCol">

        
        <?php
            //подключение бд на сайт, все данные из локалхост
            for($i = 0; $i < count($news); $i++){
                if($i == 0)
                    echo "<div id=\"bigArticle\">";
                else
                    echo "<div class=\"article\">";
                echo '<img src="/image/'.$news[$i]["id"].'.jpg" alt="Статья 1.'.$news[$i]["id"].'" title="Статья 1.'.$news[$i]["id"].'">
                <h2>'.$news[$i]["title"].'</h2>
                <p>'.$news[$i]['intro_text'].'</p>
                    <a href="/article.php?id='. $news[$i]["id"].'">
                        <div>Далее</div><!-- div class="more"-->
                    </a>
                </div>';
                    if($i == 0)
                        echo "<div class=\"clear\"><br></div>";
            }
        ?>

        </div>
        <?php require_once "blocks/rightCol.php" ?>
    </div>

    <?php require_once "blocks/footer.php" ?>
</body>
</html>