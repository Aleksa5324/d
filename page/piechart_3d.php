<?php
include_once '../connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<html>
  <head>
	<meta charset="UTF-8">
	<title>Голосование</title>
	
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="../js/scripts.js"></script>
	<link rel="stylesheet" type="text/css" href="../style.css" />
  </head>
  <body>
  
	<div id="video-bg">
		<video width="100%" height="auto" autoplay="autoplay" loop="loop" preload="auto" poster="../bg/daisy-stock-poster.jpg">
			<source src="../bg/daisy-stock-h264-video.mp4" type="video/mp4"></source>
			<source src="../bg/daisy-stock-webm-video.webm" type="video/webm"></source>
		</video>
	</div>
		
		<div class="titul">
			<?php 
			if(isset($_SESSION['question'])) {
				echo $_SESSION['question'];
			} else echo "Выберите тему голосования... <a href='../index.php'>Перейти</a>";	
			?> 
			
		</div>
		
		<div class="legenda">
			<p class ="blue">Да  <?php echo $_SESSION['PHONE1'];?></p>
			<p class ="red">Нет  <?php echo $_SESSION['PHONE2'];?></p>
		</div>
		
		<div id="piechart_3d"></div>
		<table id="result"></table>
  </body>
</html>