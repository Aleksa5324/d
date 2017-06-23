<!DOCTYPE html>
<html lang="en">
<html>
  <head>
	<meta charset="UTF-8">
	<title>Голосование</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="scripts.js"></script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 1200px; height: 800px;"></div>
	
	
<?php 
	//require_once 'connection.php'; 
	
	// подключаемся к базе пока напрямую
		
	$link = mysqli_connect("127.0.0.1", "root", "", "cdr") or die("Не могу соединиться с MySQL");
	mysqli_set_charset($link, "utf8");

	
	$query = "SELECT `dcontext`,COUNT(`dst`) AS dst
		FROM `cdr` WHERE `dst`='gsm0'
		GROUP BY `dcontext`
		UNION
		SELECT `dcontext`,COUNT(`dst`) AS dst
		FROM `cdr` WHERE `dst`='gsm2'
		GROUP BY `dcontext`";
		
		
	// выводим итоговую таблицу количества звонков
	 
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

	if($result)
	{
		$rows = mysqli_num_rows($result); 
		 
		echo "<table><tr><th>Количество звонков:</th></tr>";
		for ($i = 0 ; $i < $rows ; ++$i)
		{
			$row = mysqli_fetch_row($result);
			echo "<tr>";
				for ($j = 0 ; $j < 3 ; ++$j) echo "<td>     $row[$j]     </td>";
			echo "</tr>";
		}
		echo "</table>";
		 
		// очищаем результат
		mysqli_free_result($result);
	}
	 
	  mysqli_close($link);
?>
	
	
  </body>
</html>