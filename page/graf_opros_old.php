<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';

//выбор графика
if(isset($_POST['subOpros'],$_POST['chart'])){
	$chart = $_POST['chart'];
	
	if($chart == '1') {
		header("Location: piechart_o.php");
		exit();
	} elseif($chart == '2') {
		header("Location: columnchart_o.php");
		exit();
	}
}  





if(isset($_POST['chart'])){
	$_SESSION['CHART'] = trim($_POST['chart']);
}


if(isset($_POST['question_o'])){
	$_SESSION['QUESTION_ID'] = trim($_POST['question_o']);
	
	//получаем вопрос по ID, который пришел в $_POST['question_o']
	$res = mysqli_query($db, "SELECT * FROM `questions_opros` WHERE `id` = '".$_SESSION['QUESTION_ID']."' ");

	$row = mysqli_fetch_array($res);
	$_SESSION['QUESTION_O'] = $row['question'];
	
}


?>

<!DOCTYPE html>
<html lang="en">
<html>
  <head>
	<meta charset="UTF-8">
	<title>Результаты опроса</title>
	
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="../js/scripts_o.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<script>
		var typesChart = '<?php echo $_SESSION['CHART']; ?>';
	</script>
  </head>
  <body>
	
		<div class="titul">
			<?php 
			if(isset($_SESSION['QUESTION_O']) && $_SESSION['QUESTION_O'] != '') {
				echo $_SESSION['QUESTION_O'];
			} else echo "Выберите тему опроса... <a href='options_oprosy.php#opt2'>Перейти</a>";	
			?> 
			
		</div>
		
		
		
		<div id="chart_div" style="margin-top: 65px";></div>
		
		
  </body>
</html>