<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';



if(isset($_POST['question_o'])){
	$_SESSION['QUESTION_O'] = trim($_POST['question_o']);
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
	<script src="../js/scripts_opros.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../style.css" />
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