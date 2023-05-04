<?php 
require_once '../config/connect.php';
session_start();
    $test = $_GET["test"];
    $name = $_GET["name"];

    $testTxt = $_POST["question"];
    $testAnswer = $_POST["answer"];
    $textTxt = $_POST["text"];

    $curs = mysqli_query($connect, "SELECT `curs` FROM `accaunts` WHERE `id` = " . $_SESSION['id']);
    $curs = mysqli_fetch_all($curs);

    if(!empty($testTxt)){
        $a = $testTxt . " (" . $testAnswer . "). ";
        mysqli_query($connect, "INSERT INTO `content` (`id`, `id_course`, `name`, `test`, `content`) VALUES (NULL, '" . $curs[0][0] . "', '$name', 1, '$a')");
    }
    if(!empty($textTxt)){
        mysqli_query($connect, "INSERT INTO `content` (`id`, `id_course`, `name`, `test`, `content`) VALUES (NULL, '" . $curs[0][0] . "', '$name', 0, '$textTxt')");
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


    <a href="openCurs.php?cursId=<?= $curs[0][0] ?>">Вернуться назад</a><br>


    <?php if($test){?>

        <form action="" method="post">
           <!-- <label for="">Название </label><input type="text" value = "<?= $name ?>" name = "name">-->
            <label>Вопрос </label><input type="text" name = "question"><br>
            <label>Варианты ответов (через запятую без пробелов, только 3 варианта) </label><br>
            <input type="text" name = "answer">
            <input type="submit" value="Отправить">
        </form>

     <?php }else{ ?>

        <form action="" method="post">
            <!--<label for="">Название </label><input type="text" value = "<?= $name ?>" name = "name">-->
            <label>Введите содержание</label><br><textarea name="text" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="Отправить">
        </form>

    <?php } ?>




</body>
</html>