<?php


if(isset($_POST['exit'])){

    if(!isset($_SESSION))
    {
        session_start();
    }
    $_SESSION = [];
}
header("Location:index.php");


?>
