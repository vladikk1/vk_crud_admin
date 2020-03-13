<?php
session_start();

include "include/database.php";


if(!empty($_FILES['img_file']['name'])){
    $name_img = $_FILES['img_file']['name'];
    $user_id = $_SESSION['id'];
    $query_select = "SELECT `avatarka` FROM `user_data` WHERE user_id = '".$user_id."'";
    $sqlselect = mysqli_query($link,$query_select);
    $num_rows = mysqli_num_rows($sqlselect);


    if($num_rows < 1){
        $query =  "INSERT INTO `user_data`(`id`,`user_id`, `hobby`, `city`, `old`,`avatarka`) VALUES (null,'".$user_id."',0,0,0,'".$name_img."')";
        $sqlquery = mysqli_query($link,$query);
        header("Location:/");
    }


    $query_update = "UPDATE `user_data` SET `avatarka`='".$name_img."' WHERE user_id = '".$user_id."'";
    $sqlupdate = mysqli_query($link,$query_update);


   header("Location:/");






}



