<?php
include_once '../connect.php';


?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Голосование</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../style.css" />
 
 <!-- Latest compiled and minified JavaScript -->
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="../js/scripts3.js"></script>
  <script type="text/javascript">
	function showTime()
	{
	  var dat = new Date();
	  var H = '' + dat.getHours();
	  H = H.length<2 ? '0' + H:H;
	  var M = '' + dat.getMinutes();
	  M = M.length<2 ? '0' + M:M;
	  var S = '' + dat.getSeconds();
	  S =S.length<2 ? '0' + S:S;
	  var clock = H + ':' + M + ':' + S;
	  document
		.getElementById('time_div')
		  .innerHTML=clock;
	  setTimeout(showTime,1000);  // перерисовать 1 раз в сек.
	}
</script>
  </head>
  <body>
	<div class="titul">
		<?php 
		if(isset($_SESSION['question'])) {
			echo $_SESSION['question'];
		} else echo "Выберите тему голосования... <a href='../index.php'>Перейти</a>";	
		?> 
			
	</div>
	
	<div class ="container-fluid">		
		<div class="row">
			
			
			<div class="col-md-4" style="padding-top:100px;">	
				<label>Текущее время:	</label>
				<div id="time_div" style="font-size:40px; font-weight:200; width:85px; margin-left: 0px;"> </div>
				<script type="text/javascript"> showTime();</script>
			</div>
		</div>
	</div>	
	
	
  </body>
</html>



