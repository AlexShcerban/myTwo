<?php
    require_once "../config/connect.php";

    $part = $_GET["content"];

    $content = mysqli_query($connect, "SELECT * FROM `content` WHERE `id` = $part");
    $content = mysqli_fetch_all($content);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?= $content[0][2]."|||" ?>
    <?php
        if($content[0][3] == 0){
            echo $content[0][4];
        }
        else
        { 
            ?>

                <form action="../php/test.php" method = "get">

            <?php
            $txt = $content[0][4];
            $n = substr_count($txt, ".");
            for($i = 0; $i < $n; $i++){
                $txt = $content[0][4];
                $position2 = 0;

                for($x = 0; $x <= $i; $x++){
                    $position1 = $position2;
                    $position2 = strpos($txt, ".", $position1 + 1) + 1;
                }

                $txt = substr($txt, $position1, ($position2 - $position1));

                $position1 = strpos($txt, "(");
                $position2 = strpos($txt, ")");

                $answer = substr($txt, ($position1 + 1), ($position2 - $position1 - 1));
                $name = substr($txt, 0, $position1);

                $position1 = strpos($answer, ",");
                $position2 = strpos($answer, ",", ($position1 + 1));

                ?>
                    <br>
                    <p><?= $name ?>
                        <br>
                        <?= substr($answer, 0, $position1) ?> <input type="radio" name="test<?= $i ?>" id="" value = "<?= substr($answer, 0, $position1) ?>">
                        <br>
                        <?= substr($answer, $position1 + 1, ($position2 - $position1 - 1)) ?> <input type="radio" name="test<?= $i ?>" id="" value = "<?= substr($answer, $position1 + 1, ($position2 - $position1 - 1)) ?>">
                        <br>
                        <?= substr($answer, $position2 + 1) ?> <input type="radio" name="test<?= $i ?>" id="" value = "<?= substr($answer, $position2 + 1) ?>">
                        <br>
                    </p>


        <?php }?>
        <input type="submit" value="Отправить">
        </form> 
    <?php }
    ?>

</body>
</html>