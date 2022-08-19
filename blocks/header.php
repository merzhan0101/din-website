<header>
    <!-- Шапка сайта -->
    <div id="logo">
        <a href="/" title="Перейти на главную">
            <span>Г</span>лавная
        </a>
    </div>
    <div id="menuHead">
        <a href="/about.php">
            <div style="margin-right: 5%">О нас</div>
        </a>
        <a href="/feedback.php">
            <div>Обратная связь</div>
        </a>
    </div> 
    
    <!-- первый вариант -->
    <div id="regAuth">
    <?php if(isset($_SESSION['user'])):?>
        привет <?=$_SESSION['user']['fio']?> | <a href="logout.php">Выйти</a><!-- session->берет фио с юзер -->
    <?php else:?>
        <a href="/reg.php">Регистрация</a> | <a href="auth.php">Авторизация</a> 
    <?php endif;?>

    <!-- второй вариант -->
    <!-- <?php
        if(isset($_SESSION['user'])){
            echo "привет ".$_SESSION['user']['fio'];
        }else{
            echo '<a href="/reg.php">Регистрация</a> | <a href="auth.php">Авторизация</a>';
        }
    ?> -->

    <!-- третий вариант -->
    <!-- <?php if(isset($_SESSION['user'])){ ?>
        привет <?=$_SESSION['user']['fio']?>
    <?php }else{ ?>
        <a href="/reg.php">Регистрация</a> | <a href="auth.php">Авторизация</a> 
    <?php } ?> -->
    </div>
</header>