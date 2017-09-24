<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';

/**
*Получаем данные БД и преобразовываем в json формат для построения графика
*
*/
function getDataString(){
	global $db;
		
	$query = "SELECT `answer`, `votes` FROM `answers_opros` WHERE `question_id` = ".$_SESSION['QUESTION_ID']." ";

	$res = mysqli_query($db, $query);
	
	$data = '{"cols": [';
	$data .= '{"label":"Ответ","type":"string"},';
	$data .= '{"label":"Голоса","type":"number"}';
	$data .= '],"rows": [';		
		
	while($row = mysqli_fetch_assoc($res)){
		$data .= '{"c":[{"v":"'.$row['answer'].'"},{"v":'.$row['votes'].'}]},';
	}
		
	$data = rtrim($data, ',');
	$data .= ']}';
		
	return $data;
}



echo getDataString();
