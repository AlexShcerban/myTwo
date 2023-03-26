<?php

$connect = mysqli_connect('localhost', 'root', '', 'One_BD');

if(!$connect){
    die ('Ошибка БД');
}
