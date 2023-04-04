<?php
    session_start();
require_once 'config/connect.php';

$accaunts = mysqli_query($connect, "SELECT * FROM `accaunts`");//получение данных
$accaunts = mysqli_fetch_all($accaunts);//нормальный вид

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
        <header>

        </header>
        <main>
            <div id = "message_block"></div>

            <button onclick="gen_Message()">Жми</button>
            <button onclick="gen_Button()">Вопрос</button>

//////////////////////
            <button onclick="func()">Fufu</button>
/////////////////////

            <a href="html/catalog.php">2 страница</a>
            <form action = "auth.php" method="post" name="frm" id = "registr_block">
                <fieldset>
                    <p>Email: <input type="email" name="email" id=""></p>
                    <p>Пароль: <input type="password" name="password" id=""></p>
                    <input type="button" onclick="checkform()" value="Регистрация">
                </fieldset>
            </form>



//////////////////////////////////////////////////////

            <div id = "accaunt_info">
                <?php 
                if($_SESSION["id"] != 0){
                    $_id = $_SESSION["id"];
                    ?>
                    Name: <?= $accaunts[$_id - 1][1] ?><br>
                    Curs: <?= $accaunts[$_id - 1][3] ?><br>
                    Buy: <?= $_SESSION["id_buy"] ?><br>
                    <?php
                }

                  /*  foreach($accaunts as $accaunt)
                    {
                    ?>
                        Name: <?= $accaunt[1] ?><br>
                        Curs: <?= $accaunt[3] ?><br>
                    <?php
                    }*/
                ?>
            </div>
/////////////////////////////////////////////



        </main>
        <footer>

        </footer>
    </body>
</html>