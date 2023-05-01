<?php
    require_once "../config/connect.php";

    $part = $_GET["content"];
    $curs = $_GET["curs"];

    $content = mysqli_query($connect, "SELECT * FROM `Course`");
    $content = mysqli_fetch_all($content);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?= $content[$curs - 2][1] ?>


    <form action="../php/test.php" method = "get">
        <br>
        <p>Выберите 1
            <br>
            1 <input type="radio" name="test" id="" value = "1">
            <br>
            2 <input type="radio" name="test" id="" value = "2">
            <br>
            3 <input type="radio" name="test" id="" value = "3">
            <br>
            <input type="submit" value="Отправить">
        </p>
    </form>

</body>
</html>