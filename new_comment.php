<?php

$file = "text.txt";

if(file_exists($file)){
    $database = file_get_contents($file);
    $decodfile = json_decode($database,true);
    $data['comment'] = $_POST['comment'];
    $id = $_POST['id'];
    $decodfile[$id]['comment'][] = $data['comment'];

    $encode = json_encode($decodfile);
    file_put_contents($file,$encode);
    header("Location:/");






}





