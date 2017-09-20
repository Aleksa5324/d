<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';

	

if(isset($_POST['addAnswer'],$_POST['answer'], $_POST['selectPhone']))  {
	$_POST['answer'] = trim($_POST['answer']);
	
	if(isset($_GET['question_id'])) {
	mysqli_query($db,"
		INSERT INTO `answers_opros`(`id`, `answer`, `question_id`, `phone`) VALUES (NULL, '".mysqli_real_escape_string($db,trim($_POST['answer']))."', '".(int)$_GET['question_id']."', '".$_POST['selectPhone']."')
			
	") or exit(mysqli_error());
	} elseif (isset($_POST['question_id'])){
		mysqli_query($db,"
		INSERT INTO `answers_opros`(`id`, `answer`, `question_id`, `phone`) VALUES (NULL, '".mysqli_real_escape_string($db,trim($_POST['answer']))."', '".(int)$_POST['question_id']."', '".$_POST['selectPhone']."')
			
	") or exit(mysqli_error());
	}
	
	MessageSend(3,'Запись была добавлена');
		
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
<!--info --> 
<?php MessageShow(); ?>
<br>
	
		<div class = "row">
			<div class="col-md-12">	
				<form action="" method="post">
					<fieldset>
					<legend style="color: green">Добавление ответа на вопрос для формирования опроса пользователей</legend>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
								<label>Ответ</label>
									<input class = "form-control"  type="text" name="answer">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
								<label>ID вопроса</label>
									<input class = "form-control" type="text" name="question_id" placeholder="
									<?php if(isset($_GET['question_id'])){echo $_GET['question_id'];} else {$_GET['question_id']='';} 
									?>" align="left" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Телефон для голосования</label>
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
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<button type="submit" name="addAnswer" class="btn btn-success">Добавить </button>
								</div>
							</div>
						</div>	
					</fieldset>
				</form>
				
				<a href="options_oprosy.php" class="btn btn-warning" role="button">Вернуться</a>
			</div>	
		</div>	
	</div>	
	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
  </body>
</html>