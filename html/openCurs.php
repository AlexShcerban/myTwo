<?php

    require_once "../config/connect.php";
    $id = $_GET["cursId"];
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
    <?php 
    for($i = 1; $i < 4; $i++){ ?>
    <a href = "content.php?content=<?= $i ?>&curs=<?= $id ?>">Ссылка на <?= $i ?> главу курса</a>
    <br>
    <?php } ?>
</body>
</html>