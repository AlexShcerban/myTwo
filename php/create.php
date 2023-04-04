<?php

require_once '../config/connect.php';

$name = $_POST['_name'];
$description = $_POST['description'];
$price = $_POST['price'];


mysqli_query($connect, "INSERT INTO `Course` (`id`, `name`, `price`, `description`) VALUES (NULL, '$name', '$price', '$description')");

header('Location: course.php');
?>