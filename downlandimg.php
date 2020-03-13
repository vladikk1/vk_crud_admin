<?php

if(isset($_POST['file']))
{
    $file = $_POST['file'];
}
header('Content-Type: application/octet-stream');
//header('Content-type: application/force-download');
header('Content-Disposition: attachment; filename='.$file.'');
?>
