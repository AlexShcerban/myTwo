<?php 
require_once '../config/connect.php';
session_start();
    $test = $_GET["test"];
    $name = $_GET["name"];
    $id_curs = $_GET["id_curs"];

    $testTxt = $_POST["question"];
    $testAnswer = $_POST["answer"];
    $textTxt = $_POST["text"];

    $curs = mysqli_query($connect, "SELECT `curs` FROM `accaunts` WHERE `id` = " . $_SESSION['id']);
    $curs = mysqli_fetch_all($curs);
    
    // Создание теста
    if(!empty($testTxt)){
        $b = mysqli_query($connect, "SELECT `name`, `content`, `id` FROM `content`");
        $b = mysqli_fetch_all($b);
        $a = $testTxt . " (" . $testAnswer . "). ";
        $c = 0;
        for($i = 0; $i < count($b); $i++){
            if($name == $b[$i][0]){
                mysqli_query($connect, "UPDATE `content` SET `content` = '" . $b[$i][1] . $a . "' WHERE `id` = " . $b[$i][2]);
                $c = 1;
            }
        }
        if($c != 1){
            mysqli_query($connect, "INSERT INTO `content` (`id`, `id_course`, `name`, `test`, `content`) VALUES (NULL, '" . $id_curs . "', '$name', 1, '$a')");
        }
    }
    // Создание лекции
    if(!empty($textTxt)){
        mysqli_query($connect, "INSERT INTO `content` (`id`, `id_course`, `name`, `test`, `content`) VALUES (NULL, '" . $id_curs . "', '$name', 0, '$textTxt')");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание контента</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>


    <a href="openCurs.php?cursId=<?= $id_curs ?>">Вернуться назад</a><br><br>


    <?php // Форма создания
    if($test){
        ?>
        <form action="" method="post">
            <label>Вопрос </label><input type="text" name = "question"><br>
            <label>Варианты ответов (через запятую без пробелов, только 3 варианта) </label><br>
            <input type="text" name = "answer">
            <br><br>
            <input type="submit" value="Отправить">
        </form><br>

     <?php }else{ ?>

        <form action="" method="post">
            <label>Введите содержание</label><br><textarea name="text" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="Отправить">
        </form>

    <?php } ?>




</body>
</html>