<?php



// подключаемся к серверу 
$db = mysqli_connect("127.0.0.1", "root", "", "cdr") or die("Ошибка " . mysqli_error($db));
mysqli_set_charset($db, "utf8");


function getDataString(){
	global $db;
	$query = "SELECT `result`,COUNT(`result`) AS dst
            FROM `cdr` WHERE `result`='Да'
            GROUP BY `result`
            UNION
            SELECT `result`,COUNT(`result`) AS dst
            FROM `cdr` WHERE `result`='Нет'
            GROUP BY `result`;";

	$res = mysqli_query($db, $query);
	$data = '{"cols": [';
	$data .= '{"label":"Да","type":"string"},';
	$data .= '{"label":"Нет","type":"string"}';
	$data .= '],"rows": [';

	while($row = mysqli_fetch_assoc($res)){
		$data .= '{"c":[{"v":"' . $row['result'] . '"},{"v":' . $row['dst'] . '}]},';
	}
	$data = rtrim($data, ',');
	$data .= ']}';
	return $data;
}
echo getDataString();

//закрываем подключение
//mysqli_close($link);
?>