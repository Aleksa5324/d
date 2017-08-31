<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';

// Каталог, в который мы будем принимать файл:
$uploaddir = '../uploaded/';
$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);

// Копируем файл из каталога для временного хранения файлов:
if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
{
echo "<h3>Файл успешно загружен на сервер</h3>";
}
else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }

// Выводим информацию о загруженном файле:
echo "<h3>Информация о загруженном на сервер файле: </h3>";
echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['uploadfile']['name']."</b></p>";
echo "<p><b>Mime-тип загруженного файла: ".$_FILES['uploadfile']['type']."</b></p>";
echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['uploadfile']['size']."</b></p>";
echo "<p><b>Временное имя файла: ".$_FILES['uploadfile']['tmp_name']."</b></p>";







//Загрузка файла логотипа (рабочий)
if(isset($_POST['subUploadfile'])) {
// Каталог, в который мы будем принимать файл:
$uploaddir = '../uploaded/';
$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);

// Копируем файл из каталога для временного хранения файлов:
if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile)){
	MessageSend(3,'Файл успешно загружен на сервер');
	
	mysqli_query($db, "INSERT INTO `logo` VALUES ('', '$logo', '$_SESSION[USER_ID]')");

}else MessageSend(1,'Не удалось загрузить файл на сервер!'); 

}























/*Вариант загрузка логотипа
$array = array('image/gif','image/jpeg','image/png');
$array2 = array('jpg', 'jpeg', 'gif', 'png');

if (isset($_POST['subOpt4'], $_POST['logo'])){
	if($_FILES['logo']['error'] == 0) {
	   
	   if($_FILES['logo']['size'] < 5000 || $_FILES['logo']['size'] > 50000000 ) {
		   echo 'размер изображения нам не подходит';
	    } else {
		   preg_match('#\.([a-z]+)$#iu', $_FILES['logo']['name'], $matches);
		  
		   if(isset($matches[1])) {
			   $matches[1] = mb_strtolower($matches[1]);
			   
			   $temp = getimagesize($_FILES['logo']['tmp_name']);
			 
			   $name = '../uploaded/'.date(Ymd-His).'img'.rand(10000,99999).'.jpg';
			   
			   if(!in_array($matches[1], $array2)) {
				   echo 'Не подходит расширение изображения';
			   } elseif(!in_array($temp['mime'], $array)) {
				   echo 'Не подходит тип файла, можно загружать только изображения';
			   } elseif(!move_uploaded_file($_FILES['logo']['tmp_name'], '.'.$name)) {
				   echo 'Изображение не загружено! Ошибка';
			   } else {
				   echo 'Изображение загружено верно';
				   
			   }
		    } else {
			   echo 'Данный файл не является картинкой. Принимаемые типы файлов: jpg, png, gif';
		    }
	    }
    }
}
*/








if(isset($_POST['subUploadfile'])) {
// Каталог, в который мы будем принимать файл:
$uploaddir = '../uploaded/';
$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);

// Копируем файл из каталога для временного хранения файлов:
if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile)) 
{
MessageSend(3,'Файл успешно загружен на сервер');

}
else MessageSend(1,'Не удалось загрузить файл на сервер!'); 

}







?>





