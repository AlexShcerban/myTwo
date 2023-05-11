<?php

require_once '../config/connect.php';

$products = mysqli_query($connect, "SELECT * FROM `Course`");//получение данных
$products = mysqli_fetch_all($products);//нормальный вид

$search1 = $_GET["search"];
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

        <?php include "../html/header.php"; 
        
        ?>


        <main>
            <!-- Форма поиска -->
            <form action="" method="get" id = "search_">
                <input type="text" value = "" name = "search">
                <input type="submit" value="Поиск">
            </form>

            <!-- Создание списка курсов -->
            <div id = "catalog_block" class = "table">
                <div class = "goods">
                    <?php for($i = 0; $i <= count($products); $i++){
                        // Проверка введено ли поисковое слово
                        if($search1 == ""){
                            $find = true;
                        } 
                        else{
                            $find = substr_count($products[$i][1], $search1);
                        }
                        // Генерация
                        if($find){ 
                        ?>
                        <div class = "product">
                            <a href = "product.php?id_product= <?= $products[$i][0] ?>">
                                <?= $products[$i][1] ?>
                                <br> 
                                <img src= "<?= $products[$i][4] ?>" alt="Фото курса" width = "170" height = "170" style = "margin-top: 10px;">
                            </a>
                        </div>
                    <?php } } ?> 
                </div>
            </div>

        </main>
       <!-- <footer>

        </footer> -->
    </body>
</html>

