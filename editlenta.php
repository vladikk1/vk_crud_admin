<?php

$file = 'text.txt';
$get = file_get_contents($file);
$getdecode = json_decode($get,true);
$id = $_REQUEST['id'];
$userdata = $getdecode[$id];

if(isset($_POST['save'])){
    $data['my_new_info_blog'] = $_POST['my_new_info_blog'];//Принимаем данные новые
    $id = $_POST['id'];
    $getdecode[$id]=$data;
    $getdecode = json_encode($getdecode);
    file_put_contents($file,$getdecode);
    header("Location:/",true,301);
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
<form action="editlenta.php" method="post">
    <table>
        <tr>
            <td><input type="text" name="my_new_info_blog" value="<?php echo $userdata['my_new_info_blog'] ?>"</td>


            <td><input type="submit" name="save"></td>
        </tr>
        <input name="id" type="hidden" value="<?php echo $id;?>">
</form>
</table>



</body>
</html>
