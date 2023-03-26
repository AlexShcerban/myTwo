<?php

require_once '../config/connect.php';

$name = $_POST['_name'];
$descrition = $_POST['description'];
$price = $_POST['price'];

mysqli_query($connect, "INSERT INTO `Course` (`id`, `name`, `price`, `description`) VALUES (NULL, '$name', '$price', '$descrition')");

header('Location: course.php');
?>