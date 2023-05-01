<?php
require_once '../config/connect.php';
session_start();

/*$accaunts = mysqli_query($connect, "SELECT * FROM `accaunts`");//получение данных
$accaunts = mysqli_fetch_all($accaunts);//нормальный вид*/

echo (int)$_GET["curs_id"];

mysqli_query($connect, "UPDATE `accaunts` SET `curs` = ". (int)$_GET["curs_id"] ." WHERE `id` = " . $_SESSION["id"]);
header("Location: ../index.php");
?>
