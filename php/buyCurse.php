<?php
require_once '../config/connect.php';
session_start();

$price = (int)$_GET["price"];
$money = mysqli_query($connect, "SELECT `money`, `id` FROM `accaunts` WHERE `id` = " . $_SESSION["id"]);
$money = mysqli_fetch_all($money);
$id = $money[0][1];

if($money[0][0] >= $price)
{
    $curs_id = $_GET["curs_id"];
   // mysqli_query($connect, "UPDATE `accaunts` SET `curs` = " . $id);
    mysqli_query($connect, "UPDATE `accaunts` SET `money` = ". ($money[0][0] - $price) . "  WHERE `id` =" . $id);
    mysqli_query($connect, "INSERT INTO `list_course` (`id`, `id_course`, `id_accaunt`, `owner`, `percent`) VALUES (NULL, '$curs_id', '$id', 0, 0)");
}
echo "UPDATE `accaunts` SET `money` = ". ($money[0][0] - $price) . "WHERE `id` =" . $id;
header("Location: ../index.php");
?>
