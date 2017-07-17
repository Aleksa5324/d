

<!DOCTYPE html>
<html lang="en">
<html>
  <head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Admin:Голосование</title>
	<!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="../style.css" />
 
 <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   
  </head>
  <body>
	<ul class="nav nav-pills"> 
	  <li role="presentation"><a href="index.php">Настройка</a></li> 
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
  </body>
</html>