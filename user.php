<?php
session_start();
include "include/database.php";

$email = $_POST['email'];
$password = md5($_POST['password']);
$query = "Select * from users where email='$email' AND password='$password'";


 $sqlquery = mysqli_query($link,$query);


if(mysqli_num_rows($sqlquery) > 0){
    $array =  mysqli_fetch_array($sqlquery,MYSQLI_ASSOC);

if(!empty($array['email'])){

    $_SESSION['email'] = $array['email'];//Запись в сессию
    $_SESSION['role'] = $array['role'];
    $_SESSION['id'] = $array['id'];
if($email == "admin@ad") {

        $query_admin = "SELECT `role` FROM `users` WHERE role = 1";
        $sql_admin = mysqli_query($link, $query_admin);
        $array_admin = mysqli_fetch_array($sql_admin, MYSQLI_ASSOC);

        if ($array_admin['role'] == 1) {
            header("Location: admin.php");
            exit();
        }
    }

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
    <title>VK</title>
    <style>
     *{
         margin: 0;
         padding: 0;
         box-sizing: border-box;
     }
     .container {
         max-width: 1200px;
         width: 100%;
         margin: 0 auto;
     }
     .info{
         display: flex;
         margin-top: 30px;
     }

    .info_img-style{
        width: 300px;
        height: 400px;
        background: #000;
    }
    .info__button {
        border: 0;
        border-radius: 5px;
        background: rgb(140, 137, 137);
        width: 300px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        font-size: 16px;
        color: rgb(45, 36, 93);
        cursor: pointer;
    }
    .info_content{
        margin-left: 50px;
    }
    .person_form{
        position: relative;
        padding-bottom: 20px;
    }
        .person_form::after{
            position: absolute;
            display: block;
            width: 700%;
            height: 1px;
            content: "";
            bottom: 0;
            left: 0;
            border-bottom: 1px solid black;
        }
        .person{
            border: 0;
            background: transparent;/*Прозрачный*/
            cursor: pointer;
            font-size: 20px;
        }
    .info_hoby{
        display: flex;
        margin-top: 20px;
    }
        .hoby-style{
            background: transparent;
            margin-left: 10px;
            font-size: 15px;
            border: 0;
            cursor: pointer;
        }
    .block{
        width: 300px;
        height: 170px;
        margin-top: 10px;
        text-align: left;
        padding: 5px;
        resize: none;/*Чтобы не меняло свои размеры*/
    }
    .my_blog{
        margin-top: 200px;
    }
    .my_blog-form{
        display: flex;
        align-items:flex-end;/*Чтобы кнопка внизу была*/
    }

    .my_blog_input{
        margin-top: 10px;
        width: 100px;
        height: 40px;
        margin-left: 10px;
        cursor: pointer;
        display: flex;
    }
.lenta{
    margin-left: 600px;
}



    </style>
</head>
<body>

    <div class="container">
        <div class="info">
            <div class="info_img">
                <?php
                $file = "img";
                $uploads_dir = 'my_files';
                move_uploaded_file($_FILES["img_file"]["tmp_name"], "my_files/" . $_FILES["img_file"]["name"]);

                $user_id = $_SESSION['id'];

                $query_img = "SELECT `avatarka` FROM `user_data` WHERE `user_id`= '".$user_id."'";

                $sqlimg = mysqli_query($link,$query_img);

                $array =  mysqli_fetch_array($sqlimg,MYSQLI_ASSOC);

                if(!empty($array['avatarka'])){

                    $avatarka = $array['avatarka'];
                    $dir = './my_files/'.$avatarka.'';


                }


                ?>
                <? if(file_exists($dir)): ?>
                    <img src="<?php echo $dir ; ?>"  width="400">';
                <? else: ?>
                <img class="info_img-style" src="https://lh3.googleusercontent.com/bgAuxUGArC8zH3NLJip3hn7CJur37IRotIqB5Xly--Zind-JD9r-ndCj30b1Wec7aOQ" alt="Аватарка">
                <? endif;?>
                <form action="/new_ava.php" method="post" enctype="multipart/form-data">
                        <input name="img_file" type="file" />
                        <input name="save" type="submit" value="Сохранить" />

                </form>

            </div>

            <div class="info_content">
                <form action="" method="post" class="person_form">

                    <input class="person" type="submit" name="name" value="
                    <?php




                    ?>" >

                </form>

                    <div class="info_hoby">
                             <form action="subhobby.php" method="post">
                    <table>
                        <tr>Мое хобби</tr>
                        <tr><input type="text" name="hobby" placeholder="футбол"  class="hoby-style"></tr>
                        <br>
                        <tr>Город: </tr>
                        <tr><input type="text" name="city" placeholder="Киев" class="hoby-style">  </tr>
                        <br>
                        <tr>Мой возраст: </tr>
                        <tr><input type="text" name="old" placeholder="18"  class="hoby-style"></tr>

                            <tr><input type="submit" name="submit" value="submit" ></tr>
                        </form>
                        <form action="edithobby.php">
                            <input type="submit" name="redak" value="Редактировать">
                        </form>

                    </table>

                        </div>

            </div>
                <div class="my_blog">
                    <form action="addlenta.php" method="post" class="my_blog-form">
                    <input placeholder="Что у вас нового?" class="block" name="my_new_info_blog" id="" cols="30" rows="10">
                        <input class="my_blog_input" type="submit" name="sent" value="Опубликовать">
                    </form>
                    <form action="comment.php" method="post">

                    </form>
                </div>

            </div>

    </div>
    <div class="container">
    <div class="lenta">
        <?php
        $file = "text.txt";
        if(file_exists($file)) {
            $figet = file_get_contents($file);
            $figet = json_decode($figet, true);

            foreach ($figet as $key => $value) {
                echo "\n<tr>";
                echo "<td>" . $value['my_new_info_blog'] . "</td>";
                echo "<td> <a href='editlenta.php?id=$key'>Редактировать</a>";
                echo "<td> <a href ='deletelenta.php?id=$key'>Удалить</a>" . "<br>";
                echo "</tr>";

                echo "<form action='new_comment.php?id=$key' method='post'>";
                echo "<input type='text' name='comment'>" . "<br>";
                echo "<input type='submit' name='save_comment'>";
                echo "<input type='hidden' name='id' value='$key'>";
                echo "</form>";
                echo "<pre>";

                if (!empty($value['comment'])) {
                    foreach ($value['comment'] as $id => $comment){
                       echo $comment;
                        echo "<td> <a href='editcomment.php?id=$key/$id'>Редактировать</a>";
                        echo "<td> <a href ='deletecomment.php?id=$key/$id'>Удалить</a>" . "<br>";
                    }

                }
            }

            }

        ?>
    </div>
    </div>


<div class="container">
    <form action="exituser.php" method="post">
        <input type="submit" name="exit" value="Выход">
    </form>
</div>



</body>
</html>











