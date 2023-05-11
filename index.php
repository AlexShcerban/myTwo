<?php
    session_start();
require_once 'config/connect.php';

$_id = $_SESSION["id"];
if($_id != 0){
    $accaunts = mysqli_query($connect, "SELECT * FROM `accaunts` WHERE `id`=$_id");//получение данных
    $accaunts = mysqli_fetch_all($accaunts);//нормальный вид
    $list_course = mysqli_query($connect, "SELECT `list_course`.id_course FROM `accaunts` JOIN `list_course` ON `accaunts`.id = `list_course`.id_accaunt WHERE `accaunts`.id =$_id");
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
                .
                <?php if($_SESSION["id"] > 0){ ?>
                    <div class = "windowBig">
                        Name: <?= $accaunts[0][1] ?><br>
                        Баланс: <?= $accaunts[0][4] ?><br><br>
                    
                        <div>
                            Мои Курсы: <br>
                            <?php
                            for($i = 0; $i <= (count($curses) + 1); $i++){
                                ?>
                                <a href="html/openCurs.php?cursId=<?= $curses[$i][0] ?>"> <?= $curses[$i][1] ?> </a><br>
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
                <?php } else { ?>
                    <form action = "auth.php" method="get" name="frm" class = "windowBig">
                        <fieldset>
                            <input type="hidden" name="exit" value = "2">
                            <p>Email: <input type="email" name="email" id=""></p>
                            <p>Пароль: <input type="password" name="password" id=""></p>
                            <input type="button" onclick="checkform()" value="Вход" class = "button">
                        </fieldset>
                    </form>
                <?php } ?>
                <br><br><br><br><br><br>_
            </div>
        </main>
        <footer>
            Footer
        </footer>
    </body>
</html>