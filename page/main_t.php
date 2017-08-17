<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';


//echo '<pre>'.print_r($_POST,1). '</pre>';
d($_SESSION['number_tel_1'],0);
d($_SESSION['number_tel_2'],0);
d($_SESSION['number_tel_3'],0);

//извлекаем с базы данных куки
if(isset($_SESSION['USER_LOGIN_IN'])&& $_SESSION['USER_LOGIN_IN'] != 1 and $_COOKIE['user']){
	$row = mysqli_fetch_assoc(mysqli_query($db, "SELECT `id`, `name`, `regdate`, `email` FROM `users` WHERE `password` = '$_COOKIE[user]"));	
	$_SESSION['USER_ID'] = $row['id'];
	$_SESSION['USER_NAME'] = $row['name'];
	$_SESSION['USER_REGDATE'] = $row['regdate'];
	$_SESSION['USER_EMAIL'] = $row['email'];
	$_SESSION['USER_LOGIN_IN'] = 1;
}





//выбор графика
if(isset($_POST['selectoptions']) && $_POST['selectVote'] == 'opt1'){
	$selectoptions = $_POST['selectoptions'];
	
	if($selectoptions == 'option1') {
		header("Location: piechart_3d.php");
		exit();
	} elseif($selectoptions == 'option2') {
		header("Location: columnchart_material.php");
		exit();
	} elseif($selectoptions == 'option3') {
		header("Location: piechart_barchart.php");
		exit();
	} elseif($selectoptions == 'option4') {
		header("Location: progress.php");
		exit();
	}
} elseif(isset($_POST['selectoptions']) && $_POST['selectVote'] == 'opt2'){
	$selectoptions = $_POST['selectVote'];
	
	if($selectoptions == 'opt2') {
		header("Location:  polls.php");
		exit();
	}  
}



//извлечение тем для голосований из базы
$result =  mysqli_query ($db,"
SELECT * 
FROM `questions` 
ORDER BY `id` DESC
") or exit(mysqli_error());


//извлечение 1 номера телефона для голосований из базы
$result1 =  mysqli_query ($db,"
SELECT * 
FROM `telefons` 
ORDER BY `id` DESC
") or exit(mysqli_error());

//извлечение 2 номера телефона для голосований из базы
$result2 =  mysqli_query ($db,"
SELECT * 
FROM `telefons` 
ORDER BY `id` DESC
") or exit(mysqli_error());

//извлечение 3 номера телефона для голосований из базы
$result3 =  mysqli_query ($db,"
SELECT * 
FROM `telefons` 
ORDER BY `id` DESC
") or exit(mysqli_error());


//info
/*if(isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}*/


//вывод сайта для зарегистрированных пользователей
if (!isset($_SESSION['USER_LOGIN_IN']) or $_SESSION['USER_LOGIN_IN'] =0 ) {
	MessageSend(1, 'Требуется регистрация пользователя.');
} elseif (isset($_SESSION['USER_LOGIN_IN']) && $_SESSION['USER_LOGIN_IN'] =1){
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
    <link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<!-- Custom styles for this template -->
    <link rel="stylesheet" href="../css/navbar-fixed-top.css">
	<link rel="stylesheet" type="text/css" href="../css/timeTo.css">
	
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

<!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">ГОЛОСОВАНИЕ</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="main.php">Главная</a></li>
            <li><a href="history.php">История</a></li>
			<li><a href="news.php">Новости</a></li>
            <li class="dropdown">
              <a href="news.php" class="dropdown-toggle" data-toggle="dropdown">Настройки<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="admin_polls.php">Интернет голосование</a></li>
                <li class="divider"></li>
				<li><a href="options.php">Опции графиков</a></li>
             </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signin.php">Вход</a></li>
			<?php Menu(); ?>
            <!--<li class="active"><a href="page/cab.php">КАБИНЕТ</a></li>-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	


	
<div class = "container">

	

		
<!-- Телефонные номера -->

<form id ="form1" action="main.php" method="post">		
	<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Номера телефонов</label>
						<select class="form-control" name="selectTel1">
							<option value="">Выберите 1-й номер</option>
							
							<?php
							while ($row = mysqli_fetch_array($result1)){
								echo "<option value=' ".$row['id']." '>".$row['number_tel']."</option>";
							}
						
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    $opt1 = $_POST['selectTel1']; //тут будет выбраное значение из списка
    $q1 = mysqli_query ($db, "
	SELECT * FROM `telefons` 
	WHERE `id`=".$opt1."
	") or exit(mysqli_error());
	while($row = mysqli_fetch_assoc($q1)){
		$_SESSION['number_tel_1'] = $row['number_tel']; //сохраняем в сессию номер телефона
		
	}
}	

?>							

						
						</select>
   						
					</div>
				</div>
				
			</div>
			
		
		
		
		<!-- выбор 2 тел  -->
		
		<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Номера телефонов</label>
						<select class="form-control" name="selectTel2">
							<option value="">Выберите 2-й номер</option>
							
							<?php
							while ($row = mysqli_fetch_array($result2)){
								echo "<option value=' ".$row['id']." '>".$row['number_tel']."</option>";
							}
						
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    $opt2 = $_POST['selectTel2']; //тут будет выбраное значение из списка
    $q2 = mysqli_query ($db, "
	SELECT * FROM `telefons` 
	WHERE `id`=".$opt2."
	") or exit(mysqli_error());
	while($row = mysqli_fetch_assoc($q2)){
		$_SESSION['number_tel_2'] = $row['number_tel']; //сохраняем в сессию номер телефона
	}
}	

?>							

						
						</select>
   						
					</div>
				</div>
				
			
			
			</div>
			
				


		
<!-- выбор 3 тел-->

		<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Номера телефонов</label>
						<select class="form-control" name="selectTel3">
							<option value="">Выберите 3-й номер</option>
							
							<?php
							while ($row = mysqli_fetch_array($result3)){
								echo "<option value=' ".$row['id']." '>".$row['number_tel']."</option>";
							}
						
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    $opt3 = $_POST['selectTel3']; //тут будет выбраное значение из списка
    $q3 = mysqli_query ($db, "
	SELECT * FROM `telefons` 
	WHERE `id`=".$opt3."
	") or exit(mysqli_error());
	while($row = mysqli_fetch_assoc($q3)){
		$_SESSION['number_tel_3'] = $row['number_tel']; //сохраняем в сессию номер телефона
	}
}	

?>							

						
						</select>
   						
					</div>
				</div>
				
				
		</div>
		
	<div class="col-md-1">
					<div class="form-group">
					<br>
						<button name ="subTel3" type="submit" class="btn btn-warning">Применить</button>
					</div>
				</div>	

</form>		
		

</div>	<!-- /container-fluid -->

	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
	<script src="../js/jquery.time-to.js"></script>
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

<?php } ?>