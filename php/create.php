<?php
session_start();
require_once '../config/connect.php';

$name = $_POST['_name'];
$description = $_POST['description'];
$price = $_POST['price'];
//Сделать get способ

//$accaunt = mysqli_query ($connect, "SELECT `id` FROM `accaunt` WHERE")


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
$id = $_SESSION["id"];
$a = mysqli_query ($connect, "SELECT `id` FROM `Course`");
$a = mysqli_fetch_all($a);
$a = end($a);
mysqli_query($connect, "INSERT INTO `Course` (`id`, `name`, `price`, `description`, `photo`) VALUES (NULL, '$name', '$price', '$description', '$pathFile')");
mysqli_query($connect, "INSERT INTO `list_course` (`id`, `id_course`, `id_accaunt`, `owner`, `percent`) VALUES (NULL, '" . ($a[0] + 1) . "', '$id', 1, 100)");//как получить id созданного курса???

header('Location: course.php');
?>