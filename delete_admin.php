<?php
session_start();

include "include/database.php";
$query_select = "SELECT * FROM `users`";
$sql_select = mysqli_query($link,$query_select);
$array_admin = mysqli_fetch_array($sql_select);

$id_delete = $array_admin['id'];


$query_delete = "DELETE FROM `users` WHERE id = '$id_delete'";


$query_delete_data = "DELETE FROM `user_data` WHERE user_id = '$id_delete'";

$sql_delete = mysqli_query($link,$query_delete);
$sql_delete_data = mysqli_query($link,$query_delete_data);

header("Location: admin.php");














