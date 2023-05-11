<header id = "header">
    <?php 
        session_start();
        if($_SESSION["id"] > 0){ ?>
            <a href="../index.php">Личный кабинет</a>
            <a href="../html/catalog.php">Каталог</a>
            <a href="../php/create.php">Создание курса</a>
    <?php } else { ?>
            <a href="../index.php">Регистрация</a>
            <a href="../html/catalog.php">Каталог</a>
    <?php } ?>
</header>