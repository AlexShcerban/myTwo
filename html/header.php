<header id = "header">
    <?php 
        session_start();
        if($_SESSION["id"] > 0){ ?>
            <a href="../index.php"><div class = "header_button">Личный кабинет</div></a>
            <a href="../html/catalog.php"><div class = "header_button">Каталог</div></a>
            <a href="../php/create.php"><div class = "header_button">Создание курса</div></a>
    <?php } else { ?>
            <a href="../index.php"><div class = "header_button">Регистрация</div></a>
            <a href="../html/catalog.php"><div class = "header_button">Каталог</div></a>
    <?php } ?>
</header>