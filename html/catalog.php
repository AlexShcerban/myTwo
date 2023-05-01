<?php

require_once '../config/connect.php';

$products = mysqli_query($connect, "SELECT * FROM `Course`");//получение данных
$products = mysqli_fetch_all($products);//нормальный вид


session_start();
?>


<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/style.css" />

        <script src="../js/catalog.js"></script>
        <title>Каталог</title>
    </head>
<script>
    var ar = <?php echo json_encode($products)?>;
</script>
    <body onload="gen_Goods(ar)">
        <main>
            <a href="../index.php">1 страница</a>
            <a href="../php/create.php">3 страница</a>
            <div id = "catalog_block"></div>
        </main>
        <footer>

        </footer>
    </body>
</html>

