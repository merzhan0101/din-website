<?php 
$mysqli = false;
function connectDB(){
    global $mysqli;
    $mysqli = new mysqli('localhost', 'root', '', 'it_companybase');
    $mysqli->query("SET NAMES 'utf-8'");
}

//Отключится от БД
function closeDB(){
        global $mysqli;
        $mysqli->close();
}

sessioN_start();
    
?>
