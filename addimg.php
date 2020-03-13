<?php

$dir = './my_files/'; // сохраним в переменную путь к нашей папке
if (is_dir($dir) && file_exists($dir)) { // проверим существует ли данный каталог и каталог ли это
    $images = scandir($dir); //если все ок, то получаем список файлов из каталога.
    for ($i = 0; $i < count($images); $i++) { //запускаем перебор массива в цикле
        $image = $dir . $images[$i]; // получаем в переменную путь к файлу
        if (exif_imagetype($image)) { // проверяем является ли файл картинкой
            echo '<img src="' . $image . '"width="500">'; // выводим картинку

        }
    }
    echo "<script language=\"JavaScript\"> 
  window.location.href = \"/\"
</script>";
}

?>

