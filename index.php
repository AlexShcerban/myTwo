<?php
    session_start();
require_once 'config/connect.php';

$_id = 1;
if($_SESSION["id"] != 0){
    $_id = $_SESSION["id"];
    $accaunts = mysqli_query($connect, "SELECT * FROM `accaunts` WHERE `id`=$_id");//получение данных
    $accaunts = mysqli_fetch_all($accaunts);//нормальный вид
    $curses = mysqli_query($connect, "SELECT `Course`.id, `Course`.name FROM `accaunts` JOIN `Course` ON `accaunts`.curs = `Course`.id WHERE `accaunts`.id =$_id");
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
                .
             <!--   <div id = "message_block"></div>
                <button onclick="gen_Message()">Жми</button>
                <button onclick="gen_Button()">Вопрос</button>
                <button onclick="func()">Fufu</button>
                <a href="html/catalog.php">2 страница</a>
                <a href="php/create.php">3 страница</a>-->

                <div class = "windowBig">
                    Name: <?= $accaunts[0][1] ?><br>
                    Баланс: <?= $accaunts[0][4] ?><br><br>
                    Мои Курсы: <a href="html/openCurs.php?cursId=<?= $curses[0][0] ?>"> <?= $curses[0][1] ?> </a><br>
                </div>

                <form action = "auth.php" method="post" name="frm" class = "windowBig">
                    <fieldset>
                        <p>Email: <input type="email" name="email" id=""></p>
                        <p>Пароль: <input type="password" name="password" id=""></p>
                        <input type="button" onclick="checkform()" value="Регистрация" class = "button">
                    </fieldset>
                </form>
                <br><br><br><br><br><br>_
            </div>
        </main>
        <footer>
            Footer
        </footer>
    </body>
</html>