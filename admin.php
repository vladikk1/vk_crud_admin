<?php
session_start();

include "include/database.php";

$query_select = "SELECT * FROM `users`";

$result = mysqli_query($link,$query_select);









//
//    do{
//        echo "<pre>";
//        echo "$id_admin -- $login_admin -- $email_admin -- $phone_admin -- $role_admin ";
//        $id_admin = $id_admin + 1;
//    }while($array_admin = mysqli_fetch_array($sql_select));


for($i = 0; $i < $num_rows_admin; $i++){
    $array_admin = mysqli_fetch_array($result);
    echo "<pre>";
    echo "<td ><form action='delete_admin.php' method='post'>
                   <input type='submit' name='delete_admin' value='Удалить'>
                </form></td>";
    echo "</tr>";
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


<?

if ($result){
    $num_rows_admin = mysqli_num_rows($result);
    echo "<table border='1' bgcolor='#7fffd4'>";
    echo "<th>";
    echo "id";
    echo "</th>";
    echo "<th>";
    echo "login";
    echo "</th>";
    echo "<th>";
    echo "email";
    echo "</th>";
    echo "<th>";
    echo "password";
    echo "</th>";
    echo "<th>";
    echo "phone";
    echo "</th>"; echo "<th>";
    echo "role";
    echo "</th>";
    for ($i = 0; $i< $num_rows_admin; $i++){
        $row = mysqli_fetch_row($result);
        echo "<tr>";
        for ($j= 0; $j<=5;$j++){
            echo "<td>".$row[$j]."</td>";


        }
        echo "<td ><form action='delete_admin.php' method='post'>
                   <input type='submit' name='delete_admin' value='Удалить'>
                </form></td>";

        echo "</tr>";
    }

    echo "</table>";
}
?>


<div class="container">
    <form action="exit_admin.php" method="post">
        <input type="submit" name="exit" value="Выход">
    </form>
</div>




</body>
</html>

































