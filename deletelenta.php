<?php



$file = 'text.txt';

$id = $_REQUEST['id'];
$fileid = file_get_contents($file);
$fileid = json_decode($fileid,true);
unset($fileid[$id]);
$fileid = json_encode($fileid);
file_put_contents($file,$fileid);


header("Location:/",true,301);

