<?php
    session_start();
require_once 'config/connect.php';

$_id = $_SESSION["id"];
if($_id != 0){
    $accaunts = mysqli_query($connect, "SELECT * FROM `accaunts` WHERE `id`=$_id");//получение данных
    $accaunts = mysqli_fetch_all($accaunts);//нормальный вид
    $list_course = mysqli_query($connect, "SELECT `list_course`.id_course, `list_course`.owner FROM `accaunts` JOIN `list_course` ON `accaunts`.id = `list_course`.id_accaunt WHERE `accaunts`.id =$_id");
    $list_course = mysqli_fetch_all ($list_course);

    $list_id = "1";
    for($i = 0; $i < count($list_course); $i++){
        $list_id .= "," . $list_course[$i][0];
    }

    $curses = mysqli_query($connect, "SELECT `id`, `name` FROM `Course` WHERE `id` in (" . $list_id . ")");
    $curses = mysqli_fetch_all($curses);
}
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/style.css" />

        <script src="js/message.js"></script>
        <script src="js/log_in.js"></script>
        <title>Личный кабинет</title>
    </head>
    <body>
        <?php include "html/header.php" ?>
        <main>
            <div class = "table">
                .<!-- Основная информация -->
                <?php if($_SESSION["id"] > 0){ ?>
                    <div class = "windowBig" id = "main_info">
                        Name: <?= $accaunts[0][1] ?><br>
                        Баланс: <?= $accaunts[0][4] ?><br><br>
                        <!-- Мои курсы -->
                        <div id = "main_my_course">
                            <?php
                            for($i = 0; $i < (count($curses)); $i++){
                                ?>
                                <a href="html/openCurs.php?cursId=<?= $curses[$i][0] ?>">
                                <div class = "my_course"> <?= $curses[$i][1] ?>
                                <?php 
                                    for($r = 0; $r < count($list_course); $r++){
                                        if($curses[$i][0] == $list_course[$r][0]){
                                            if($list_course[$r][1] == 1){
                                                echo "<br> Владелец";
                                            }
                                        }
                                    }
                                ?>
                                </div> </a><br>
                                <?php
                            }
                            ?>
                        </div>
                        <div>
                            <form action="auth.php" method="get">
                                <input type="hidden" name="exit" value = "3">
                                <input type="submit" value="Выйти" class = "button">
                            </form>
                        </div>
                    </div>
                    <!-- Регистрация -->
                <?php } else { 
                    if(empty($_GET["registr"])) {?>
                    <form action = "auth.php" method="get" name="frm" class = "windowBig">
                        <fieldset>
                            <label>Вход</label><br>
                            <input type="hidden" name="exit" value = "2">
                            <p>Email: <input type="text" name="email" id="" maxLength = "20"></p>
                            <p>Пароль: <input type="password" name="password" id=""  maxLength = "20"></p>
                            <input type="button" onclick="checkform()" value="Вход" class = "button">
                        </fieldset>
                    </form>
                    <form action="" method="get">
                        <input type="hidden" name="registr" value = "1">
                        <input type="submit" value="Регистрация" class = "button" style = "margin-left: 65px; margin-top: 10px;">
                    </form>
                    <?php } else { ?>
                    <form action = "auth.php" method="get" name="frm1" class = "windowBig">
                        <fieldset>
                            <label>Регистрация</label><br>
                            <input type="hidden" name="exit" value = "1">
                            <p>Email: <input type="text" name="email" id=""  maxLength = "20"></p>
                            <p>Пароль: <input type="password" name="password" id="" maxLength = "20"></p>
                            <!--<input type="button" onclick="checkform()" value="Регистрация" class = "button">-->
                            Я не робот: <input type="checkbox" name="norobot" id=""><br><br>
                            <input type="submit" value="Регистрация" class = "button">
                        </fieldset>
                    </form>
                    <form action="" method="get">
                        <input type="submit" value="Вход" class = "button" style = "margin-left: 65px; margin-top: 10px;">
                    </form>
                <?php } } ?>
                <br><br><br><br><br><br>_
            </div>
        </main>
        <footer>
            Footer
        </footer>
    </body>
</html>