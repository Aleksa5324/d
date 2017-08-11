<?php
include_once '../connect.php';

if(isset($_POST['add'],$_POST['title'])) {
	$_POST['title'] = trim($_POST['title']);
	
	
	mysqli_query($db,"
		INSERT INTO `news` SET
			`title`= '".mysqli_real_escape_string($db,trim($_POST['title']))."',
			`date`= NOW()
	") or exit(mysqli_error());
		
	$_SESSION['info'] = 'Запись была добавлена';
	header('Location: news.php');
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
    <title>Управление новостями</title>

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
				<form action="add_news.php" method="post">
					<fieldset>
					<legend style="color: green">Добавление новости</legend>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
								<label>Заголовок новости</label>
									<input class = "form-control"  type="text" name="title">
								</div>
							</div>
						</div>
												
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<button type="submit" name="add" class="btn btn-success">Добавить</button>
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
    <script src="../js/bootstrap.js"></script>
  </body>
</html>