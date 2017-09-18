<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';


if(isset($_POST['edit'],$_POST['access'])) {
	
	foreach($_POST as $k=>$v) {
	$_POST[$k] = trim($v);
	}
	
    mysqli_query($db,"
		UPDATE `users` SET
			`access`= '$_POST[access]'
			WHERE `id` = ".(int)$_GET['id']."
	") or exit(mysqli_error($db));
	
	MessageSend(3,'Запись была изменена', 'users.php');
}


//получаем данные пользователя по ID
$user= mysqli_query($db,"
		SELECT * 
		FROM `users` 
		WHERE `id` = ".(int)$_GET['id']."
		LIMIT 1
	") or exit(mysqli_error());
	
if(!mysqli_num_rows($user)) {
	MessageSend(1,'Данного пользователя не существует', 'users.php');
}

$row = mysqli_fetch_assoc($user);

if(isset($_POST['access'])) {
	$row['access'] = $_POST['access'];
	
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
    <title>Редактрование пользователя</title>

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

	<div class = "container-fluid">	
		<div class = "row">
			<div class="col-md-12">	
				<form class="form-horizontal" action="" method="post">
						<br>
						<fieldset>
						<legend style="color: green">Редактирование доступа пользователя</legend>
						
							<div class="form-group">
								<label class="col-sm-2 control-label">ID</label>
								<div class="col-sm-10">
								  <p class="form-control-static"><?php echo $row['id']; ?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Имя</label>
								<div class="col-sm-10">
								  <p class="form-control-static"><?php echo $row['name']; ?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Дата регистрации</label>
								<div class="col-sm-10">
								  <p class="form-control-static"><?php echo $row['regdate']; ?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">E-mail</label>
								<div class="col-sm-10">
								  <p class="form-control-static"><?php echo $row['email']; ?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Доступ</label>
								<div class="col-sm-4">
								  <input type="text" name ="access" class="form-control" placeholder="0-Пользователь; 3-Модератор; 5-Администратор" required autofocus style="margin-bottom: 5px;" value="">
								</div>
							</div>
							
							
							
							<div class="form-group">
								<div class="col-md-4 col-md-offset-2">
									<button type="submit" name="edit" class="btn btn-success">Сохранить</button>
								</div>
							</div>
						
						</fieldset>	
				</form>	
				
			</div>	
		</div>	
	</div>	
	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
  </body>
</html>