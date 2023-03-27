<?php

require_once 'config/connect.php';

$accaunts = mysqli_query($connect, "SELECT * FROM `accaunts`");//получение данных
$accaunts = mysqli_fetch_all($accaunts);//нормальный вид


    if(!empty($_POST["email"]) && !empty($_POST["password"])){

        foreach($accaunts as $accaunt)
        {

            if($_POST["email"] === $accaunt[1] && $_POST["password"] === $accaunt[2] ){
                print $accaunt[0];
                echo " ";
                print $accaunt[1];
                $_POST["id"] = $accaunt[0];
            }

        }
        $urlBack = file_get_contents("index.php");
        echo $urlBack;
        exit();
    }
?>