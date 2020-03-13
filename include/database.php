<?php

$host = 'vk';
$user = 'root';
$password = '';
$database = 'testdb';

$link =  mysqli_connect($host,$user,$password,$database);/*Подключение базы данных*/

if(!$link){
    echo 'Ошибка в подключении базы данных('.mysqli_connect_errno().'):'.mysqli_error();//errno(номер ошибка),erro(текст ошибки)
    exit();
}





