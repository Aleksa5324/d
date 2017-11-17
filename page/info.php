<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';


if (isset($_POST['subGol'])) {
	header ("Location: golos.php");
	exit();
}


if (isset($_POST['subTesty'])) {
	header ("Location: testy.php");
	exit();
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
    <title>Информация</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<!-- Custom styles for this template -->
    <link href="../css/navbar-fixed-top.css" rel="stylesheet">
	
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	


	
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
			<?php  
			if(isset($_SESSION['USER_ACCESS']) && $_SESSION['USER_ACCESS'] == 0){
				include 'menu_user0.php'; 
			} elseif(isset($_SESSION['USER_ACCESS']) && $_SESSION['USER_ACCESS'] == 3){
				include 'menu_user3.php'; 
			} else{
				include 'menu.php';
			}	
			?>
			
            <?php MenuCabinet();?>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>

	
<!-- Вывод инфосообщения -->
<?php if(isset($info)) { ?>
	<h2 style="color:red; padding-left:15px;"><?php echo $info; ?></h2>
<?php } ?>

	
<div class = "container">
<!--info --> 
<?php MessageShow(); ?>

	
		
		
		<p>Уважаемый Пользователь! Мы рады Вас приветствовать на нашем сайте!</p>
		<p>Виртуальная школа — уникальный портал для дистанционного обучения и развития сотрудников, предоставляющий доступ к базе знаний и возможность командного взаимодействия в режиме реального времени 24/7.</p>
		
			

		<div class="section__list">
            <ul style="padding-left: 0px;">
                <li class="list1">Возможность обучения из любой<br>точки мира, где есть доступ<br>в Интернет</li>
                <li class="list2">Более 300 единиц учебного контента<br>(мультимедийные курсы,<br>видеолекции и др.)</li>
                <li class="list3">Поддержка программ управленческого<br>развития в формате<br>blended learning</li>
                <li class="list4">Индивидуальное планирование<br>обучения на основе корпоративной<br>матрицы компетенций</li>
				<li class="list5">Проведение вебинаров<br>и онлайн-конференций</li>
                <li class="list6">Тестирование и оценка<br>руководителей/сотрудников</li>
            </ul>
        
		</div>
		<br><br>
		
		
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<a href="golos.php" class="btn btn-warning btn-block" role="button">Перейти к голосованию</a>
					
				</div>
			</div>
		
			<div class="col-md-4">
				<div class="form-group">
					<a href="testy.php" class="btn btn-warning btn-block" role="button">Перейти к тестам</a>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
					<a href="video.php" class="btn btn-warning btn-block" role="button">Перейти к видео</a>
				</div>
			</div>
		</div>
		
		
</div>	<!-- /container -->

	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>


	
  </body>
</html>
