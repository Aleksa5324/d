<?php

if(isset($_POST['selectoptions'])){
	$selectoptions = $_POST['selectoptions'];
	
	if($selectoptions == 'option1') {
		header("Location: ../index.html");
		exit();
	} elseif($selectoptions == 'option2') {
		header("Location:../index1.html");
		exit();
	} elseif($selectoptions == 'option3') {
		header("Location:../index2.html");
		exit();
	} elseif($selectoptions == 'option4') {
		header("Location:../index3.html");
		exit();
	}
}		
?>


<!DOCTYPE html>
<html lang="en">
<html>
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin:Голосование</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../style.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
  </head>
  <body>
	<ul class="nav nav-pills"> 
	  <li role="presentation" class="active"><a href="index.php">Настройка</a></li> 
	  <li role="presentation"><a href="options.php">Опции графиков </a></li> 
	  <li role="presentation"><a href="history.php">История</a></li> 
	</ul>
	
	<br><br>	
	
	<div class = "container-fluid">
		<form role = "form" action="index.php" method="post">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Вид диаграммы</label>
						<select class = "form-control" name="selectoptions">
							<option value="option1">Круговая_3d</option>
							<option value="option2">Столбцы</option>
							<option value="option3">Круговая+Столбцы</option>
							<option value="option4">Сводный индикатор</option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Тема голосования</label>
						<input class = "form-control" type="text" name="textfield" value="">
					</div>
				</div>
			</div>
			
						
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label>Текущее время</label>
							<input class="form-control" type="text" name="textfield" size="15" value="<?php date_default_timezone_set("Europe/Helsinki"); echo date("d-m-y  H:i:s"); ?>">
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="form-group">
						<label>Время голосования</label>
							<input class="form-control" type="text" name="textfield" size="10" value="<?php echo date("0:15:00"); ?>"> 
					</div>
				</div>
			</div>
			
					
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label>Время старта</label>
						<input class="form-control" type="text" name="textfield" size="10" value="19:00:00">
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="form-group">
						<label>Время финиша</label>
						<input class="form-control" type="text" name="textfield" size="10" value="19:15:00">
						
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<button type="button" name="start" class="btn btn-success">Начать голосование</button>
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="form-group">
						<button type="button" name="stop" class="btn btn-danger">Остановить голосование</button>
					</div>
				</div>
			</div>
			
			<br>
			
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-warning">Перейти на график</button>
					</div>
				</div>
			</div>

		</form>
	</div>	
	
	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
  </body>
</html>