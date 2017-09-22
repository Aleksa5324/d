<?php

 
// подключаемся к базе 
	$db = mysqli_connect("127.0.0.1", "root", "", "cdr") or die("Ошибка " . mysqli_error($db));
	mysqli_set_charset($db, "utf8");

	function getDataString(){
		global $db;
		
		$query = "SELECT `answer`, `votes` FROM `answers_opros` WHERE `question_id` = 1 ";

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
