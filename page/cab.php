<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';


//чат
if(isset($_POST['subChat'])) {
	$_POST['text'] = FormChars($_POST['text']);
	mysqli_query($db, "INSERT INTO `chat` VALUES ('','$_POST[text]', '$_SESSION[USER_LOGIN]', NOW())");
	exit(header('location: cab.php'));
}




//редактирование профиля
if(isset($_POST['subRed'])) {
	$_POST['opassword'] = FormChars($_POST['opassword']);
	$_POST['npassword'] = FormChars($_POST['npassword']);
	$_POST['name'] = FormChars($_POST['name']); 
	
if(!empty($_POST['opassword'])	or $_POST['npassword']) {
	if(!$_POST['opassword']) MessageSend(2,'Не указан старый пароль.');
	if(!$_POST['npassword']) MessageSend(2,'Не указан новый пароль.');	
	 
	if($_SESSION['USER_PASSWORD'] != GenPass($_POST['opassword'], $_SESSION['USER_LOGIN'])) MessageSend(2,'Старый пароль указан не верно.');
	
	$password = GenPass($_POST['npassword'], $_SESSION['USER_LOGIN']);
	
	mysqli_query($db, "UPDATE `users` SET `password` = '$password'  WHERE `id` = ".$_SESSION['USER_ID']."");
	$_SESSION['USER_PASSWORD'] = $password;
}

if($_POST['name']	!= $_SESSION['USER_NAME']) {
	mysqli_query($db, "UPDATE `users` SET `name` = '$_POST[name]'  WHERE `id` = ".$_SESSION['USER_ID']."");	
	$_SESSION['USER_NAME'] = $_POST['name'];
}
MessageSend(3, 'Данные изменены.');
}
	


//выборка данных из базы между датами
if (isset($_POST['from'],$_POST['to'],$_POST['billing'])){
    $from = $_POST['from'];
    $to = $_POST['to'] ;
    	
	$result = mysqli_query($db, "
	SELECT * 
	FROM `billing` INNER JOIN `users` ON `billing`.`user_id`=`users`.`id`

	WHERE `user_id`= '".$_SESSION['USER_ID']."' AND `date` BETWEEN CAST('".$from."' AS DATE) and ADDDATE(CAST('".$to."' AS DATE),INTERVAL 1 DAY)
	 ") or exit(mysqli_error());
	
} 


//выход с сайта
if(!empty($_GET['page']) && $_GET['page'] == 'logout' && $_SESSION['USER_LOGIN_IN'] == 1) {
	if ($_COOKIE['user']) {
		setcookie('user', '', strtotime('-10 days'), '/');
		unset($_COOKIE['user']);
	}
	session_unset();
	exit(header('Location: signin.php'));	
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
    <title>Личный кабинет</title>

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
			if($_SESSION['USER_ACCESS'] == 0){
				include 'menu_user0.php'; 
			} elseif($_SESSION['USER_ACCESS'] == 3){
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

	<div class = "row">
		<div class="col-md-12">	
			<div class = "tabs">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#opt1" data-toggle="tab">Профиль</a></li>
				  <li><a href="#opt2" data-toggle="tab">Оплата</a></li>
				  <li><a href="#opt3" data-toggle="tab">Настройки</a></li>
				  <li><a href="#opt4" data-toggle="tab">Сообщения</a></li>
				</ul>

					<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="opt1">

						<form class="form-horizontal" role = "form" action="#" method="#">
						<br>
						
							<div class="form-group">
								<label class="col-sm-2 control-label">ID</label>
								<div class="col-sm-10">
								  <p class="form-control-static"><?php echo $_SESSION['USER_ID']; ?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Имя</label>
								<div class="col-sm-10">
								  <p class="form-control-static"><?php echo $_SESSION['USER_NAME']; ?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Дата регистрации</label>
								<div class="col-sm-10">
								  <p class="form-control-static"><?php echo $_SESSION['USER_REGDATE']; ?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">E-mail</label>
								<div class="col-sm-10">
								  <p class="form-control-static"><?php echo $_SESSION['USER_EMAIL']; ?></p>
								</div>
							</div>
							
							
						</form>	

						<hr>
						
						<form class="form-horizontal" role = "form" method ="POST" action ="cab.php">
							<h2>Редактирование профиля</h2>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="password" name ="opassword" class="form-control" placeholder="Старый пароль" maxlength ="15" pattern ="[A-Za-z-0-9]{5,15}" title="Не менее 5 и не более 15 латинских символов или цифр." autofocus>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="password" name ="npassword" class="form-control" placeholder="Новый пароль" maxlength ="15" pattern ="[A-Za-z-0-9]{5,15}" title="Не менее 5 и не более 15 латинских символов или цифр." autofocus>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" name ="name" class="form-control" placeholder="Имя" required autofocus style="margin-bottom: 5px;" value="<?php echo $_SESSION['USER_NAME'];?>">
									</div>
								</div>
							</div>
							
														
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<button type="submit" name="subRed" class="btn btn-warning btn-block">Изменить</button>
									</div>
								</div>
							</div>
						</form>
						
					</div>
									  
<!-- Оплата -->		<div class="tab-pane" id="opt2">
						<form role = "form" action="" method="post">
									
			<div class="row">
			<br>
				<p style="padding-left:15px;">Вы можете произвести оплату любым удобным способом через провайдер платежей ИНТЕРКАССА </p>
			
				<div class="col-md-2">
					<div class="form-group">
					<label></label>
						<a href="https://www.interkassa.com/" class="btn btn-warning" role="button">Оплатить</a>
					</div>
				</div>
			</div>
			<hr>
			
			<div class="row">
			<p style="padding-left:15px;">Для просмотра истории платежей необходимо указать период в формате dd.mm.yyyy</p>
				<div class="col-md-2">
					<div class="form-group">
						<label>Дата начала</label>
						<input class = "form-control" type="date" name="from" value="<?php if(!empty($_POST['from'])) echo $_POST['from']; ?>">
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="form-group">
						<label>Дата окончания</label>
						<input class = "form-control" type="date" name="to" value="<?php if(!empty($_POST['to'])) echo $_POST['to']; ?>">
					</div>
				</div>
				<br>
			</div>	
			
					
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<button type="submit" name="billing" class="btn btn-warning">Найти</button>
					</div>
					<?php 
					if (isset($_POST['from'],$_POST['to'])){
					$_POST['from'] = strtotime($_POST['from']);
					$dateFrom = date('d.m.Y', $_POST['from']);
					$_POST['to'] = strtotime($_POST['to']);
					$dateTo = date('d.m.Y', $_POST['to']);
					
					echo '<p>Заданный период:<b> с '.$dateFrom. ' по ' .$dateTo. '</b></p>';
					}
					?>
				</div>
			</div>

			
			<table class="table table-striped">
			</tbody>
				<tr >
					<th>Дата</th>	
					<th>Сумма</th>
					<th>Плательщик</th>
				</tr>
				
								
			<?php 	
				if (isset($result)) {
				while($row = mysqli_fetch_assoc($result)) {
				$row['date'] = strtotime($row['date']);
				$row['date'] = date('d.m.Y', $row['date']);
				
				echo '<tr>';
					echo '<td>' . $row['date'] . '</td>';
					echo '<td>' . $row['sum'] . '</td>';
					echo '<td>' . $row['login'] . '</td>';
				}
				}
			?>	
				</tr>							
				</tbody>	
			</table>	
			
			
		</form>
		
							  
					</div>
					  
					<div class="tab-pane" id="opt3">
						
						
					</div>
									  
<!--Chat -->		<div class="tab-pane" id="opt4">
					
						<div class="Page">
		
							<div class="ChatBox">

								<?php	
								$query = mysqli_query($db, 'SELECT * FROM `chat` ORDER BY `time` DESC LIMIT 50');
								while($row = mysqli_fetch_assoc($query)) {
									echo '<div class="ChatBlock"><span>'.$row['user'].' | '.$row['time'].'</span>'.$row['message'].'</div>';
								}
								?>						
								
							</div>
						
								<form class="form-horizontal" role="form" method ="POST" action ="cab.php">
									<br>									
									
									<textarea class ="ChatMessage" name="text" placeholder="Текст сообщения" required></textarea>
									
									<div class="row">
										
										<div class="col-md-4" style="padding-left: 30px;">
											<div class="form-group">
												<button class="btn btn-primary" type="submit" name ="subChat">Отправить</button>
												<button class="btn btn-danger"  type="reset">Очистить</button>
											</div>
										</div>
									</div>
								</form>
						
						
							
						</div>
					
						
					</div>
				  
				</div>
			</div>
		</div>		
	</div>		
		
		
</div>	<!-- /container -->

	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>


	
<script>
  $(function() { 
    $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
    // сохраним последнюю вкладку
    localStorage.setItem('lastTab', $(this).attr('href'));
  });

  //перейти к последней вкладки, если она существует:
  var lastTab = localStorage.getItem('lastTab');
  if (lastTab) {
    $('a[href="' + lastTab + '"]').tab('show');
  }
  else
  {
    // установить первую вкладку активной если lasttab не существует
    $('a[data-toggle="tab"]:first').tab('show');
  }
});
</script>
	
  </body>
</html>
