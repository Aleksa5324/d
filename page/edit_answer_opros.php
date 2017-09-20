<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';


//удаление вопроса из базы
if(isset($_GET['action']) && $_GET['action'] == 'delete') {
	mysqli_query($db, "
	DELETE FROM `answers_opros`
	WHERE `id` = ".$_GET['id']."
	") or exit(mysqli_error());
	
	MessageSend(3,'Ответ был удален');
}




//обновление данных
if(isset($_POST['edit'],$_POST['answer'], $_POST['selectPhone'])) {
	
	foreach($_POST as $k=>$v) {
	$_POST[$k] = trim($v);
	}
	
    mysqli_query($db,"
		UPDATE `answers_opros` SET
			`answer`= '$_POST[answer]',
			`phone`= '$_POST[selectPhone]'
			WHERE `id` = ".(int)$_GET['id']."
	") or exit(mysqli_error($db));
	
	MessageSend(3,'Запись была изменена',$_SERVER['HTTP_REFERER']);
}


//получаем данные ответа по ID

$answer = mysqli_query($db,"
		SELECT * 
		FROM `answers_opros` 
		WHERE `id` = ".(int)$_GET['id']."
		LIMIT 1
	") or exit(mysqli_error());
	
if(!mysqli_num_rows($answer)) {
	MessageSend(1,'Данного ответа для вопроса не существует');
}

$row = mysqli_fetch_assoc($answer);

if(isset($_POST['answer'])) {
	$row['answer'] = $_POST['answer'];
}

if(isset($_POST['selectPhone'])) {
	$row['phone'] = $_POST['selectPhone'];
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
  
<script>
function areYuoSure(){
	return confirm('Вы уверены, что хотите удалить?');
}
</script>
  
  
  </head>
  <body>

	<div class = "container-fluid">	

<!--info --> 
<?php MessageShow(); ?>
<br>
	
		<div class = "row">
			<div class="col-md-12">	
				<form class="form-horizontal" action="" method="post">
						<br>
						<fieldset>
						<legend style="color: green">Редактирование ответа на вопрос для проведения опросов пользователей</legend>
						
							<div class="form-group">
								<label class="col-sm-2 control-label">ID</label>
								<div class="col-sm-10">
								  <p class="form-control-static"><?php echo $row['id']; ?></p>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Ответ</label>
								<div class="col-sm-4">
								  <input type="text" name ="answer" class="form-control" placeholder="<?php echo $row['answer']; ?>" autofocus style="margin-bottom: 5px;" value="<?php echo $row['answer']; ?>">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Телефон для голосования</label>
								<div class="col-sm-4">
									<select class = "form-control" name="selectPhone">
										<option value="">Выберите телефон</option>
										<option value="+38(000)00-00-001">+38(000)00-00-001</option>
										<option value="+38(000)00-00-002">+38(000)00-00-002</option>
										<option value="+38(000)00-00-003">+38(000)00-00-003</option>
										<option value="+38(000)00-00-004">+38(000)00-00-004</option>
										<option value="+38(000)00-00-005">+38(000)00-00-005</option>
										<option value="+38(000)00-00-006">+38(000)00-00-006</option>
									</select>
								</div>
							</div>
							
						
							
							
							<div class="form-group">
								<div class="col-md-4 col-md-offset-2">
									<button type="submit" name="edit" class="btn btn-success">Сохранить</button>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-4 col-md-offset-2">
									<a href="options_oprosy.php" class="btn btn-warning" role="button">Вернуться</a>
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