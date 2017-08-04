<?php
include_once 'connect.php';


if(isset($_POST['edit'],$_POST['question'])) {
	
	foreach($_POST as $k=>$v) {
	$_POST[$k] = trim($v);
	}
	
    mysqli_query($link,"
		UPDATE `questions` SET
			`question`= '".mysqli_real_escape_string($link,$_POST['question'])."'
			WHERE `id` = ".(int)$_GET['id']."
	") or exit(mysqli_error($link));
		
	$_SESSION['info'] = 'Запись была изменена';
	header('Location: history.php');
	exit();
}


$question = mysqli_query($link,"
		SELECT * 
		FROM `questions` 
		WHERE `id` = ".(int)$_GET['id']."
		LIMIT 1
	") or exit(mysqli_error());
	
if(!mysqli_num_rows($question)) {
	$_SESSION['info'] = 'Данной темы не существует';
	header('Location: history.php');
	exit();
}

$row = mysqli_fetch_assoc($question);

if(isset($_POST['question'])) {
	$row['question'] = $_POST['question'];
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
    <title>Редактрование новости</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css" />
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
				<form action="" method="post">
					<fieldset>
						<legend style="color: green">Редактирование темы голосования</legend>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
								<label>Тема голосования</label>
									<input class = "form-control"  type="text" name="question" value="<?php echo htmlspecialchars($row['question']); ?>">
								</div>
							</div>
						</div>
						
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<button type="submit" name="edit" class="btn btn-success">Сохранить</button>
									<!--<input type="submit" name="edit" value="Отредактировать новость">-->
								</div>
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
    <script src="js/bootstrap.js"></script>
  </body>
</html>