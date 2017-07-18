

<!DOCTYPE html>
<html lang="en">
<html>
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin:Голосование</title>

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
	<ul class="nav nav-pills"> 
	  <li role="presentation"><a href="index.php">Настройка</a></li> 
	  <li role="presentation"><a href="options.php">Опции графиков </a></li> 
	  <li role="presentation" class="active"><a href="history.php">История</a></li> 
	</ul>
	
	<br><br>	
	
	<div class = "container-fluid">
		<form role = "form" action="" method="">
					
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Тема голосования</label>
						<input class = "form-control" type="text" name="tema" value="">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label>Дата начала</label>
						<input class = "form-control" type="date" value="">
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="form-group">
						<label>Дата окончания</label>
						<input class = "form-control" type="date" value="">
					</div>
				</div>
			</div>	
			
					
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<button type="submit" name="search" class="btn btn-warning">Найти</button>
					</div>
				</div>
			</div>

		</form>
	</div>	
	
	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
  </body>
</html>