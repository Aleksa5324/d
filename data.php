<?php



// подключаемся к серверу 
$db = mysqli_connect("127.0.0.1", "root", "", "cdr") or die("Ошибка " . mysqli_error($db));
mysqli_set_charset($db, "utf8");


function getDataString(){
	global $db;
	$query = "SELECT `dcontext`,COUNT(`dst`) AS dst
FROM `cdr` WHERE `dst`='gsm0'
GROUP BY `dcontext`
UNION
SELECT `dcontext`,COUNT(`dst`) AS dst
FROM `cdr` WHERE `dst`='gsm2'
GROUP BY `dcontext`;";

	$res = mysqli_query($db, $query);
	$data = '{"cols": [';
	$data .= '{"label":"Да","type":"string"},';
	$data .= '{"label":"Нет","type":"number"}';
	$data .= '],"rows": [';

	while($row = mysqli_fetch_assoc($res)){
		$data .= '{"c":[{"v":"' . $row['dcontext'] . '"},{"v":' . $row['dst'] . '}]},';
	}
	$data = rtrim($data, ',');
	$data .= ']}';
	return $data;
}
echo getDataString();

// закрываем подключение
//mysqli_close($link);
?>