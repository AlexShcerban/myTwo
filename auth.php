<?php

require_once 'config/connect.php';
session_start();
$accaunts = mysqli_query($connect, "SELECT * FROM `accaunts`");//получение данных
$accaunts = mysqli_fetch_all($accaunts);//нормальный вид

if($_GET["exit"] = 3){
    $_SESSION["id"] = 0;
}

    if(!empty($_GET["email"]) && !empty($_GET["password"])){

        foreach($accaunts as $accaunt)
        {
            echo "ad ";
            if($_GET["email"] === $accaunt[1] && $_GET["password"] === $accaunt[2] ){
                $_SESSION["id"] = $accaunt[0];
            }

        }
    }

header('Location:index.php');
exit();
?>