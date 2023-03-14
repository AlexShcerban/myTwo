<?php
    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        if($_POST["email"] === "admin@ad" && $_POST["password"] === "1111" ){
            print $_POST['email'];
            print $_POST['password'];
        }
        else{
            print "Нет";
        }
        $urlBack = file_get_contents("index.html");
        echo $urlBack;
        exit();
    }
?>