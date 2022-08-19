<?php 

    require_once "../functions/connect.php";
    require_once "../functions/functions.php";
    /* 
     * взять данные с запроса
     * валидация данных
     * проверка на не существование такого же логина
     * добавить в базу, в таблицу пользователей
     * вернуть ответ
     * 
    */
    $name = htmlspecialchars($_POST['name']); //принимаем данные и обработка с htmlspecialchars
    $fname = htmlspecialchars($_POST['fname']);
    $fio = $name." ".$fname;//объед имя и фам
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $region = htmlspecialchars($_POST['region']);
    $city = htmlspecialchars($_POST['city']);
    $date = htmlspecialchars($_POST['date']);
    if ($name == "" || $email == "" || $fname == "" || $region == "" || $city == "" || $date == ""){
        echo "Заполните все поля";
        exit; 
    }
    $password = md5($password);//захешированный пароль
    
    // Отправка
    global $mysqli;
    connectDB();
    $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email' ");
    $users = resultToArray($result);//массив
    if(count($users) > 0) {
        exit("Пользователь с таким почтой уже существует! Введите другой email!");
    }
    $result = $mysqli->query("INSERT INTO `users`(`fio`, `email`, `region`, `city`, `birthday`, `password`) VALUES ('$fio', '$email', '$region', '$city', '$date', '$password')");//commands with DB
    //улов ошибки 2 вариант
    closeDB();
    if($result)
        echo "Вы зарегистрированы";
    else
        echo "Сообщение не отправлено" . $mysqli->error;
?> 