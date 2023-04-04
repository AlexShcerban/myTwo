<?php

require_once '../config/connect.php';

?>


<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Document</title>
</head>
<body>

    <!-- Считывание данных -->
    <table>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
        </tr>

        <?php
            $products = mysqli_query($connect, "SELECT * FROM `Course`");//получение данных
            $products = mysqli_fetch_all($products);//нормальный вид
            foreach($products as $product){
                ?>

                <tr>
                    <td><?= $product[0] ?></td>
                    <td><?= $product[1] ?></td>
                    <td><?= $product[2] ?></td>
                    <td><?= $product[3] ?></td>
                </tr>

                <?php
            }
        ?>
    </table>



    <!-- Создание данных -->
    <form action="create.php" method="post">
        <p>Имя</p>
        <input type="text" name = "_name">
        <p>Описание</p>
        <textarea name="description" ></textarea>
        <p>Цена</p>
        <input type="number" name = "price"><br>
        <button type = "submit">Add new course</button>
    </form>
</body>
</html>