<?php

require_once '../config/connect.php';

?>


<!doctype html>
<html lang = "en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset = "UTF-8">
    <title>Создание нового курса</title>
</head>
<body>

<?php include "../html/header.php" ?>




    <!-- Считывание данных -->
    <table id = "create_table">
        <tr id = "create_table_head">
            <th>id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
        </tr>

        <?php /*
            $products = mysqli_query($connect, "SELECT * FROM `Course`");//получение данных
            $products = mysqli_fetch_all($products);//нормальный вид
            foreach($products as $product){
                ?>

                <tr class = "create_tr">
                    <td><?= $product[0] ?></td>
                    <td><?= $product[1] ?></td>
                    <td><?= $product[2] ?></td>
                    <td><?= $product[3] ?></td>
                </tr>

                <?php
            }
        */?>
    </table>



    <!-- Создание данных -->
    <form action="create.php" method="post" id = "create_form" enctype = "multipart/form-data">
        <p>Имя</p>
        <input type="text" name = "_name">
        <p>Описание</p>
        <textarea name="description" ></textarea>
        <p>Цена</p>
        <input type="number" name = "price"><br>

        <input type="file" name="photo" id="">
        <button type = "submit">Add new course</button>
    </form>
</body>
</html>