<?php
include_once 'connect.php';

// echo $_SESSION['question']. '<br>';

 // echo 'GET:<pre>'.print_r($_GET,1). '</pre>';
 // echo 'POST:<pre>'.print_r($_POST,1). '</pre>';
 // echo 'REQUEST:<pre>'.print_r($_REQUEST,1). '</pre>';
 

if(isset($_POST['selectoptions'])){
	$selectoptions = $_POST['selectoptions'];
	
	if($selectoptions == 'option1') {
		header("Location: page/piechart_3d.php");
		exit();
	} elseif($selectoptions == 'option2') {
		header("Location:page/columnchart_material.php");
		exit();
	} elseif($selectoptions == 'option3') {
		header("Location:page/piechart_barchart.php");
		exit();
	} elseif($selectoptions == 'option4') {
		header("Location:page/progress.php");
		exit();
	}
}

//извлечение тем для голосований из базы
$result =  mysqli_query ($link,"
SELECT * 
FROM `questions` 
ORDER BY `id` DESC
") or exit(mysqli_error());

if(isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
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
    <title>Голосование</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link href="css/timeTo.css" type="text/css" rel="stylesheet"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script>
function tGol() {
    var fname = document.getElementById('tg').value;
     
    document.getElementById('tg').innerHTML = fname;
}
</script>
</head>
  
 

  <body>
<!-- Вывод инфосообщения -->
<?php if(isset($info)) { ?>
	<h2 style="color:red; padding-left:15px;"><?php echo $info; ?></h2>
<?php } ?>


	<ul class="nav nav-pills"> 
	  <li role="presentation" class="active"><a href="index.php">Настройка</a></li> 
	  <li role="presentation"><a href="options.php">Опции графиков </a></li> 
	  <li role="presentation"><a href="history.php">История</a></li> 
	  <li role="presentation"><a href="news.php">Новости</a></li> 
	</ul>
	
	<br><br>	
	
	<div class = "container-fluid">
		<form action="index.php" method="post">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Тема для голосования</label>
						<select class="form-control" name="question">
							<option value="">Выберите вопрос</option>
							
							<?php
							while ($row = mysqli_fetch_array($result)){
								echo "<option value=' ".$row['id']." '>".$row['question']."</option>";
							}
						
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    $op = $_POST['question']; //тут будет выбраное значение из списка
    $q = mysqli_query ($link, "
	SELECT * FROM `questions` 
	WHERE `id`=".$op."
	") or exit(mysqli_error());
	while($row = mysqli_fetch_assoc($q)){
		$_SESSION['question'] = $row['question']; //сохраняем в сессию текст вопроса
	}
}	

//echo "<input type='submit' value ='Применить'></input>";



// if(isset($_SESSION['question'])) {
	// echo '<p>Текущая тема: <b>' . $_SESSION['question'] . '</b></p>';
// }
?>							

						
						</select>
   						
					</div>
				</div>
				
				
				
				<div class="col-md-1">
					<div class="form-group">
					<br>
						<button type="submit" class="btn btn-warning">Применить</button>
					</div>
				</div>
			</div>
				
<?php
if(isset($_SESSION['question'])) {
	echo '<p style = "color: #cd66cc;">Текущая тема: <b>' . $_SESSION['question'] . '</b></p>';
}	?>
				
		
		</form>
		
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
			
						
			<br>			
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
							<input id = "tg" class="form-control" type="text" name="time_gol" size="10" value ="00:00:30" > 
					</div>
				</div>
				
				<div class="col-md-2">
					<div id="countdown-1"></div>
					<p><button id="reset-1" type="button">Сбросить</button></p>
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
    <script src="js/bootstrap.js"></script>
	<script src="js/jquery.time-to.js"></script>
	<script>
		$('#countdown-1').timeTo(300, function(){				//время голосования в секундах
            alert('Всем спасибо! Голосование закончилось!');
        });
        $('#reset-1').click(function() {
            $('#countdown-1').timeTo('reset');
        });
	</script>
	
  </body>
</html>