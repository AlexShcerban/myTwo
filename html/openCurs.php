<?php
    session_start();
    $id_accaunt = $_SESSION["id"];

    require_once "../config/connect.php";
    $id = $_GET["cursId"];
    $content_name = mysqli_query($connect, "SELECT * FROM `content`");
    $content_name = mysqli_fetch_all($content_name);
    $owner = mysqli_query($connect, "SELECT `list_course`.owner FROM `accaunts` JOIN `list_course` ON `accaunts`.id = `list_course`.id_accaunt WHERE `accaunts`.id = ". $id_accaunt . " AND `list_course`.id_course = " . $id);
    $owner = mysqli_fetch_all($owner);
    // Создания списка из глав курса
    $content_all = [];
    for($x = 0; $x < count($content_name); $x++)
    {
        if($content_name[$x][1] == $id)
        {
            array_push ($content_all, $content_name[$x]);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Оглавление</title>
</head>
<body>

    <?php include "../html/header.php" ?>

    <!-- Создание оглавления курса -->
    <?php 
    foreach($content_all as $content_one){ ?>
    <a href = "content.php?content=<?= $content_one[0] ?>"><?= $content_one[2] ?></a>
    <br>
    <?php } ?>

<br><br>

    <?php
        if($owner[0][0] == 1){ ?>
            <form action="create_content.php" method="get">
                <p>Создание новой главы</p>
                <input type="hidden" name="id_curs" value = <?= $id ?>>
                <label>Название главы: </label><input type="text" name="name" id="">
                <br>
                <label>Тест: </label><input type="checkbox" name="test" id="">
                <input type="submit" value="Создать">
            </form>
        <?php } ?>

</body>
</html>