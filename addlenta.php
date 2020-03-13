<?php

/*add*/

$file = 'text.txt';
if (file_exists($file)){
    $userdata = file_get_contents($file);
    $userdata = json_decode($userdata,true);
    $data['my_new_info_blog'] = $_POST['my_new_info_blog'];
    array_push($userdata,$data);
    $allinfo = json_encode($userdata);
    $putall = file_put_contents($file,$allinfo);
}
else{
    fopen($file,'wb');
    $data['my_new_info_blog'] = $_POST['my_new_info_blog'];
    $allinfo[1] = $data;
    $allinfo = json_encode($allinfo);
     $putall = file_put_contents($file,$allinfo);
}
header("Location:/user.php",true,301);





