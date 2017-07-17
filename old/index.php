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
	require_once 'connection.php'; 
	
		
	$query = "SELECT `result`,COUNT(`result`) AS dst
            FROM `cdr` WHERE `result`='Да'
            GROUP BY `result`
            UNION
            SELECT `result`,COUNT(`result`) AS dst
            FROM `cdr` WHERE `result`='Нет'
            GROUP BY `result`";
		
		
	
      
    // выводим итоговую таблицу количества звонков
	 
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

	if($result)
	{
		$rows = mysqli_num_rows($result); 
		 
		echo "<table><tr><th>Количество звонков:</th></tr>";
        
        
		for ($i = 0 ; $i < $rows ; ++$i) {
			$row = mysqli_fetch_row($result);
			echo "<tr>";
            
				for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
            
			echo "</tr>";
		}
//        echo "<tr>"; 
//        echo "<td><b>ВСЕГО:</b></td>";
//        echo "<td><b>$sum</b></td>";
//        echo "</tr>";
        
		echo "</table>";
		 
		// очищаем результат
		mysqli_free_result($result);
	}
	 
	  mysqli_close($link);
?>


	
  </body>
</html>