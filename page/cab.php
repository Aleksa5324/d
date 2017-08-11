<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';



//выборка данных из базы между датами
if (isset($_POST['from'],$_POST['to'],$_POST['billing'])){
    $from = $_POST['from'];
    $to = $_POST['to'] ;
    	
	// $result = mysqli_query($db, "
	// SELECT * FROM `billing` 
	// WHERE `date` BETWEEN CAST('".$from."' AS DATE) and ADDDATE(CAST('".$to."' AS DATE),INTERVAL 1 DAY) 
	// ") or exit(mysqli_error());

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
          <ul class="nav navbar-nav">
            <li><a href="main.php">Главная</a></li>
            <li><a href="history.php">История</a></li>
			<li><a href="news.php">Новости</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Настройки<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="admin_polls.php">Интернет голосование</a></li>
                <li class="divider"></li>
				<li><a href="options.php">Опции графиков</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signin.php">Вход</a></li>
            <?php Menu();?>
          </ul>
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
				  <li><a href="#opt2" data-toggle="tab">Биллинг</a></li>
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
							
							<div class="row">
								<div class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-10">
										<button type="submit" name="subRed" class="btn btn-warning">Изменить</button>
									</div>
								</div>
							</div>
						</form>					
					</div>
									  
					<div class="tab-pane" id="opt2">
						<form role = "form" action="" method="post">
									
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label>Дата начала</label>
						<input class = "form-control" type="date" name="from" value="<?php $POST['from']; ?>">
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="form-group">
						<label>Дата окончания</label>
						<input class = "form-control" type="date" name="to" value="<?php $POST['to']; ?>">
					</div>
				</div>
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
					
					echo '<p>Заданный период: с <b>'.$dateFrom. ' по ' .$dateTo. '</b></p>';
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
									  
					<div class="tab-pane" id="opt4">
						
						
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
		
  </body>
</html>
