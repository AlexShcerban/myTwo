<?php
require_once '../config/connect.php';
session_start();

$price = (int)$_GET["price"];
$money = mysqli_query($connect, "SELECT `money` FROM `accaunts` WHERE `id` = " . $_SESSION["id"]);
$money = mysqli_fetch_all($money);

if($money[0][0] >= $price)
{
    mysqli_query($connect, "UPDATE `accaunts` SET `curs` = ". (int)$_GET["curs_id"] ." WHERE `id` = " . $_SESSION["id"]);
    mysqli_query($connect, "UPDATE `accaunts` SET `money` = ". ($money[0][0] - $price) ." WHERE `accaunts`.`id` = " . $_SESSION["id"]);
}
header("Location: ../index.php");


?>
