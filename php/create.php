<?php

require_once '../config/connect.php';

$name = $_POST['_name'];
$description = $_POST['description'];
$price = $_POST['price'];
//Сделать get способ



if(!empty($_FILES['photo'])){
    //var_dump($_FILES);
    echo "2 ";
    $file = $_FILES["photo"];
    $namef = $file['name'];
    $path = str_replace("\\", "/", __DIR__);
   // $pathFile = dirname($path) . "/img/" . $name;
    $pathFile = "../img/" . $namef;

    if(!move_uploaded_file($file['tmp_name'], $pathFile)){
        $pathFile = $pathFile . "standart.png";
    }
    echo "3 ";
}


mysqli_query($connect, "INSERT INTO `Course` (`id`, `name`, `price`, `description`, `photo`) VALUES (NULL, '$name', '$price', '$description', '$pathFile')");

header('Location: course.php');
?>