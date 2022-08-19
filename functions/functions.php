<?php
    require_once "connect.php";

    function getNews ($limit, $id = false) { //функция берет данные с бд
        //try catch -> для вывода ошибки ,улов
        try{
            global $mysqli;
            connectDB();
            if($id)
                $where = "WHERE `id` = ".$id; 
            $result = $mysqli->query("SELECT * FROM `news` $where ORDER BY `id` DESC LIMIT $limit");
            //улов ошибки 2 вариант
            if($mysqli->error){
                echo 'Ошибка ' . $mysqli->error;
            }
            closeDB();
            if(!$id)
                return resultToArray($result);
            else
                return $result->fetch_assoc();//fetch_assoc - бд таблицадан массив турыне келтыреды
        }catch(Exception $e) {
            echo 'Ошибка входа в базу данных';
            print_r($e);
        }
    }

    function resultToArray($result){
        $array = array();
        while(($row = $result->fetch_assoc()) != false)
        //fetch assoc = формировать ассоциативный массив
            $array[] = $row;
        return $array;
    }
?>