<!DOCTYPE html>
<head>
    <?php
        $title = "Авторизация";     
        require_once "blocks/head.php";
    ?>
    <!-- добавление билиотеки jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#done").click(function(){
                $('#messageShow').hide();//скрывает текст
                var email = $("#email").val();//принимает инпуты которые нап внизу
                var fail = "";
                var password = document.querySelector('#password').value;//js взятияя знач инпута
                if(email == "") fail = "Повторно введите ваш email";
                else if(password.trim() == "" ) //trim() - вырезает пробелы по бокам
                    fail = "Вы не ввели пароль";
                else if(fail != ""){ 
                $('#messageShow').html (fail + "<div class='clear'><br></div>");
                $('#messageShow').show();
                return false;
                }
       
                $.ajax({
                    url: '/ajax/auth.php',
                    type: 'POST',
                    cache: false,
                    data: {'email': email, 'password': password},
                    dataType: 'html',
                    beforeSend: function(){
                        $('#messageShow').html("Идет загрузка...<div class='clear'><br></div>");
                        $('#messageShow').show();
                    },
                    success: function(data){
                        $('#messageShow').html (data + "<div class='clear'><br></div>");
                        $('#messageShow').show();
                    },
                    error: function(m){
                        console.log(m);
                        $('#messageShow').html (m + "<div class='clear'><br></div>");
                    }
                });
            });
        }); 
    </script>
</head>
<body>
    <?php require_once "blocks/header.php" ?>
    <!-- Боковая панель -->
    <div id="wrapper">
        <div id="leftCol">
            <input type="text" placeholder="Введите вашу почту" id="email" name="email"><br />
            <input type="password" placeholder="Пароль" id="password" name="password"><br />
            
            <div id="messageShow"></div>
            <input type="button" name="done" id="done" value="Войти">
        </div> 
        <?php require_once "blocks/rightCol.php" ?>
    </div>

    <?php require_once "blocks/footer.php" ?>
</body>