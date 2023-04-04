<?php 
require_once '../config/connect.php';
$products = mysqli_query($connect, "SELECT * FROM `Course`");//получение данных
$products = mysqli_fetch_all($products);//нормальный вид
session_start();


$a=(int)$_GET["id_product"];// получение id открываемого товара 
$product = $products[$a];
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
        <title>Товар</title>
    </head>
    <body>
        <main>
            <div id = "product_name"><?= $product[1] ?></div>
            <div id = "product_descript"><?= $product[3] ?></div>

         <!--   <form action="" method="post">
                <input type="button" class = "button" id = "product_button" value="<?= $product[2] ?>" onclick="buy_php()">
            </form>-->

        </main>
        <footer>

        </footer>
    </body>
</html>