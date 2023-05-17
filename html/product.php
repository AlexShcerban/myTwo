<?php 
require_once '../config/connect.php';
$a=$_GET["id_product"];

$products = mysqli_query($connect, "SELECT * FROM `Course` WHERE `id` =" . $a);//получение данных
$products = mysqli_fetch_all($products);//нормальный вид
session_start();
 
$product = $products[0];
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
        <title>Выбранный курс</title>
    </head>
    <body>

        <?php include "../html/header.php" ?>


        <main>
            <div class = "table">
                <div id = "product_name"><?= $product[1] ?></div>
                <img src="<?= $product[4] ?>" alt="Фото курса" id = "product_photo">
                <div id = "product_descript"><?= $product[3] ?></div>

                <form action="../php/buyCurse.php" method="get">
                    <input type="hidden" name="price" id="" value = "<?= $product[2] ?>">
                    <input type="hidden" name="curs_id" id="" value = "<?= $product[0] ?>">
                    <input type="submit" value= "<?= $product[2] ?> руб." class = "button" id = "product_button">
                </form>
            </div>
        </main>
        <footer>

        </footer>
    </body>
</html>