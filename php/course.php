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



    <!-- Создание данных -->
    <form action="create.php" method="post" id = "create_form" enctype = "multipart/form-data">
        <p>Имя</p>
        <input type="text" name = "_name">
        <p>Описание</p>
        <textarea name="description" ></textarea>
        <p>Цена</p>
        <input type="number" name = "price" step = "100"><br>

        <input type="file" name="photo" id="">
        <button type = "submit">Add new course</button>
    </form>
</body>
</html>