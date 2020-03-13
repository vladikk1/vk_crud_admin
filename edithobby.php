<?php

$file = 'texthobby.txt';
//$get = file_get_contents($file);
//$getdecode = json_decode($get,true);
//$id = $_REQUEST['id'];
$userdata = $getdecode[$id];

if(isset($_POST['save'])){
    $data['hobby'] = $_POST['hobby'];
    $data['city'] = $_POST['city'];
    $data['old'] = $_POST['old'];//Принимаем данные новые
    $id = $_POST['id'];
    $getdecode=$data;
    $getdecode = json_encode($getdecode);
    file_put_contents($file,$getdecode);
    header("Location:/user.php",true,301);
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
<form action="edithobby.php" method="post">
    <table>
        <tr>
            <td><input type="text" name="login" value="<?php echo $userdata['hobby']?>"</td>
            <td><input type="text" name="email" value="<?php echo $userdata['city']?>"</td>
            <td><input type="text" name="password" value="<?php echo $userdata['old']?>"</td>

            <td><input type="submit" name="save"></td>
        </tr>
        <input name="id" type="hidden" value="<?php echo $id;?>">
</form>
</table>



</body>
</html>
