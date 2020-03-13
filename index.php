<?php
session_start();

var_dump("ПРИВЕТ ИЗ ГЛАВНОГО ФАЙЛА");
exit();
//session_destroy();
if(!empty($_SESSION['email'])){
    if($_SESSION['role'] == 1){
        header("Location:/admin.php");
    }

    header("Location:/user.php");
}
else{


    echo "<a href='register.php'>Регистрация/</a>";
    echo "<a href='login.php'>Логин</a>";


  }


    ?>





