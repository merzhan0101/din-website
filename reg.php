<!DOCTYPE html>
<head>
    <?php
        $title = "Обратная связь";     
        require_once "blocks/head.php";
    ?>
    <!-- добавление билиотеки jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#done").click(function(){
                $('#messageShow').hide();//скрывает текст
                var name = $("#name").val();//принимает инпуты которые нап внизу
                var fname = $("#fname").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var region = $("#region").val();
                var city = $("#city").val();
                var date = $("#date").val();
                var fail = "";
                if(name.length < 3) fail = "Имя не меньше 3 символов";
                else if(fname.length < 1) fail = "Введите фамилию правильно";
                else if(email.split('@').length - 1 == 0 || email.split('.').length - 1 == 0)
                    fail = "Вы ввели некорректный email";
                else if(/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[А-Я])(?=.*[а-я])[0-9а-яА-ЯA-Za-z]{3,}/.test(password) == false)//обяз ввести
                // /(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/g
                    fail = "Пароль должен содержать буквы A-Z, a-z и цифры"
                else if(region.trim() == '') fail = 'Вы не выбрали ваш регион'; 
                if(fail != ""){ 
                    $('#messageShow').html (fail + "<div class='clear'><br></div>");
                    $('#messageShow').show();
                    return false;
                }

                $.ajax({
                    url: 'ajax/reg.php',
                    type: 'POST',
                    cache: false,
                    data: {'name': name, 'fname': fname, 'email': email, 'password': password, 'region': region, 'city': city, 'date': date},
                    dataType: 'html',
                    beforeSend: function() {
                        $('#messageShow').html ("Идет загрузка...<div class='clear'><br></div>");
                        $('#messageShow').show();
                    },
                    success: function(data){
                        $('#messageShow').html (data + "<div class='clear'><br></div>");
                        // $('#messageShow').show();
                    }, 
                    error: function(e) {
                        console.log(e);
                        $('#messageShow').html (e + "<div class='clear'><br></div>");
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
            <input type="text" placeholder="Имя" id="name" name="name"><br />
            <input type="text" placeholder="Фамилия" id="fname" name="fname"><br />
            <input type="text" placeholder="Email" id="email" name="email"><br />
            <input type="password" placeholder="Введите пароль" id="password" name="password"><br />
            <select name="region" id="region">
                <option value="" disabled selected>выберите вашу область</option>
                <option value="Абайская область">Абайская область</option>
                <option value="Акмолинская область">Акмолинская область</option>
                <option value="Актюбинская область">Актюбинская область</option>
                <option value="Алматинская область">Алматинская область</option>
                <option value="Атырауская область">Атырауская область</option>
                <option value="Восточно-Казахстанская область">Восточно-Казахстанская область</option>
                <option value="Жамбылская область">Жамбылская область</option>
                <option value="Жетысуская область">Жетысуская область</option>
                <option value="Карагандинская область">Карагандинская область</option>
                <option value="Кызылординская область">Кызылординская область</option>
                <option value="Мангистауская область">Мангистауская область</option>
                <option value="Западно-Казахстанская область">Западно-Казахстанская область</option>
                <option value="Павлодарская область">Павлодарская область</option>
                <option value="Северо-Казахстанская область">Северо-Казахстанская область</option>
                <option value="Улытауская область">Улытауская область</option>
                <option value="Туркестанская область">Туркестанская область</option>
            </select><br /><br />
            <input type="text" placeholder="Город" id="city" name="city"><br />
            <input type="date" placeholder="Дата рождения" id="date" name="date"><br />
            <div id="messageShow"></div>
            <input type="button" name="done" id="done" value="Зарегистрироваться">
        </div> 
        <?php require_once "blocks/rightCol.php" ?>
    </div>

    <?php require_once "blocks/footer.php" ?>
</body>