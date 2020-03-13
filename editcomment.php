<?php


$file = 'text.txt';
$get = file_get_contents($file);
$getdecode = json_decode($get,true);
$id = $_REQUEST['id'];
$info = explode("/",$id);
//implode

$id_lenti = $info[0];
$id_comment = $info[1];

$informac= $getdecode[$info[0]]['comment'][$info[1]];



if(isset($_POST['save_comment'])){
    $data['comment'] = $_POST['comment'];
    $id_lenti = $_POST['id_lenti'];
    $id_comment = $_POST['id_comment'];

    $getdecode[$id_lenti]['comment'][$id_comment] = $data['comment'];
    echo "<pre>";
    var_dump($getdecode);
    exit();


    $enco = json_encode($getdecode);


    file_put_contents($file,$enco);

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
<form action="editcomment.php" method="post">
    <table>
        <tr>
            <td><input type="text" name="comment" value="<?php echo $informac; ?>"</td>


            <td><input type="submit" name="save_comment"></td>
        </tr>
        <input name="id_comment" type="hidden" value="<?php echo $id_comment;?>">
        <input name="id_lenti" type="hidden" value="<?php echo $id_lenti;?>">
</form>
</table>



</body>
</html>


