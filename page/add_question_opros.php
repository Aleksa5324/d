<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';

if(isset($_POST['add'],$_POST['question'])) {
	$_POST['question'] = trim($_POST['question']);
	
	
	mysqli_query($db,"
		INSERT INTO `questions_opros` SET
			`question`= '".mysqli_real_escape_string($db,trim($_POST['question']))."',
			`date_modification`= NOW()
	") or exit(mysqli_error());
		
	MessageSend(3,'Запись была добавлена','options_oprosy.php');
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
		<div class = "row">
			<div class="col-md-12">	
				<form action="add_question_opros.php" method="post">
					<fieldset>
					<legend style="color: green">Добавление вопроса для формирования опроса пользователей</legend>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
								<label>Вопрос</label>
									<input class = "form-control"  type="text" name="question">
								</div>
							</div>
						</div>
												
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<button type="submit" name="add" class="btn btn-success">Добавить </button>
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