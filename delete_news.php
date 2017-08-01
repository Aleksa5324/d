<?php

if(isset($_POST['del'])) {
	
$row_number = 0;    //номер строки которую удаляем
$file_out = file("page/news.txt"); // Считываем весь файл в массив
 
//записываем нужную строку в файл
file_put_contents("page/old_news.txt", $file_out[$row_number], FILE_APPEND);
 
echo "Новость: <b>$file_out[$row_number]</b> успешно удалена!<br><br> <a href='news.php'>Вернуться назад</a>"; 
//удаляем записаную строчку
unset($file_out[$row_number]);
 
//записали остачу в файл
file_put_contents("page/news.txt", implode("", $file_out));

}

?>
