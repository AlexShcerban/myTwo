<?php

require_once 'config/connect.php';
session_start();
$accaunts = mysqli_query($connect, "SELECT * FROM `accaunts`");//получение данных
$accaunts = mysqli_fetch_all($accaunts);//нормальный вид

if($_GET["exit"] = 3){
    $_SESSION["id"] = 0;
}
if($_GET["exit"] = 1){
    if(!empty($_GET["email"]) && !empty($_GET["password"]) && $_GET["norobot"]){
        $a = mysqli_query($connect, "SELECT `login` FROM `accaunts`");
        $a = mysqli_fetch_all($a);
        $log = $_GET["email"];
        $pas = $_GET["password"];
        $b = 0;
        for($i = 0; $i < count($a); $i++){
            if($log == $a[$i][0]){
                $b = 1;
            }
        }
        if($b == 0){
            mysqli_query($connect, "INSERT INTO `accaunts` (`id`, `login`, `password`, `curs`, `money`) VALUES (NULL, '$log', '$pas', 1, 0)");
        }
    }
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