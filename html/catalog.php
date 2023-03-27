<?php

require_once '../config/connect.php';

$products = mysqli_query($connect, "SELECT * FROM `Course`");//получение данных
$products = mysqli_fetch_all($products);//нормальный вид

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
    <body>
        <main>
            
            <div>
                <?php 
                    foreach($products as $product)
                    {
                    ?>
                        <script>
                         //   gen_Goods('dada', 2);
                        </script>
                    <?php
                    }
                ?>
            </div>

            <button onclick="gen_Goods('<?= $product[1] ?>', <?= $product[2] ?>)">Генерация 2</button>


            <a href="../index.php">1 страница</a>
            <div id = "catalog_block"></div>
        </main>
        <footer>

        </footer>
    </body>
</html>