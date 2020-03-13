<?php
$file = 'texthobby.txt';
    if(file_exists($file)) {

        $userdata = file_get_contents($file);
        $userdata = json_decode($userdata,true);
        $data['hobby'] = $_POST['hobby'];
        $data['city'] = $_POST['city'];
        $data['old'] = $_POST['old'];
        array_push($userdata,$data);
        $allinfo = json_encode($userdata);
        file_put_contents($file,$allinfo);
    }
    else{
        fopen($file,'wb');
        $data['hobby'] = $_POST['hobby'];
        $data['city'] = $_POST['city'];
        $data['old'] = $_POST['old'];
        $allinfo[1] = $data;
        $allinfo = json_encode($allinfo);
        file_put_contents($file,$allinfo);
}
    header("Location:/",true,301);


 ?>















