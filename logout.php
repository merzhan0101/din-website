<?php
    session_start();//session_start() - Стартует новую сессию, либо возобновляет существующую
    unset($_SESSION['user']);
    header("Location: index.php");
?>