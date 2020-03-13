<?php

session_start();
include "include/database.php";


if(isset($_POST['submit_register'])) {
    $userdata['login'] = $_POST['login'];
    $userdata['email'] = $_POST['email'];
    $userdata['password'] = $_POST['password'];
    $userdata['phone'] = $_POST['phone'];
    createUser($userdata);
}

function createUser($userdata){
    include "include/database.php";

    $login =  $userdata['login'];
    $email = $userdata['email'];
    $password = md5($userdata['password']);
    $phone = $userdata['phone'];

    $query_max_id = "SELECT MAX(`id`) FROM `users`";
    $sql_max_id = mysqli_query($link,$query_max_id);
    $array_max_id = mysqli_fetch_array($sql_max_id);
    $id_new = $array_max_id["MAX(`id`)"] + 1;

    $query = "INSERT INTO `users`(`id`, `login`, `email`, `password`, `phone`,`role`) VALUES ( '".$id_new."','".$login."','".$email."','".$password."','".$phone."',0)";

    if (!mysqli_query($link,$query)){
        printf("Errormessage: %s\n", mysqli_error($link));

}
    else{
        $_SESSION['email'] = $email;
        $_SESSION['role'] = 0;
        $_SESSION['id'] = $id_new;

        header("Location:/");
    }

}


?>









<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<form action="register.php" method="post">

    <input type="text" name="login" placeholder="login" required><br>
    <input type="password" name="password" placeholder="password" required><br>
    <input type="email" name="email" placeholder="email" required><br>
    <input type="tel" name="phone" placeholder="phone"><br>
    <input type="submit" name="submit_register" value="Регистрация">



</form>




</body>
</html>