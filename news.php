<?php

if(empty($_POST['titul_news'])){
	echo 'Введите новость';
	
} else if(!empty($_POST['titul_news'])) {
	if (isset($_POST['titul_news']) && isset($_POST['addnews'])) {
		$titul_news = $_POST['titul_news'];
		$fp = fopen("page/news.txt", "a"); // Открываем файл в режиме записи
		$mytext = $titul_news." * \r\n"; // Исходная строка
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo '<p style="color: red"> Данные в файл успешно занесены.</p>';
		else echo 'Ошибка при записи в файл.';
		fclose($fp); //Закрытие файла
	
}
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
	<ul class="nav nav-pills"> 
	  <li role="presentation"><a href="index.php">Настройка</a></li> 
	  <li role="presentation"><a href="options.php">Опции графиков </a></li> 
	  <li role="presentation"><a href="history.php">История</a></li> 
	  <li role="presentation"class="active"><a href="news.php">Новости</a></li> 
	</ul>
	
	<br><br>	
	
<div class = "container-fluid">	
	<div class = "row">
		<div class="col-md-12">	
			<div class = "tabs">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#opt1" data-toggle="tab">Добавление</a></li>
				  <li><a href="#opt2" data-toggle="tab">Редактирование</a></li>
				  <li><a href="#opt3" data-toggle="tab">Удаление</a></li>
				</ul>

					<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane active" id="opt1">
					<form role = "form" action="news.php" method="post">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Заголовок новости</label>
									<input class = "form-control" type="text" name="titul_news" value="">
								</div>
							</div>
						</div>
			
						<div class="row">		
							<div class="col-md-4">
								<div class="form-group">
									<label>Текст новости</label>
									  <textarea class="form-control" rows="10"></textarea>
								</div>
							</div>	
						</div>
			
			
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<button type="submit" name="addnews" class="btn btn-success">Добавить</button>
								</div>
							</div>
						</div>
								  
					</form>
				  </div>
				  
				  
				  <div class="tab-pane" id="opt2">
					<form role = "form" action="" method="post">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<button type="submit" name="editnews" class="btn btn-warning">Редактировать</button>
								</div>
							</div>
						</div>
											
					</form>
				  </div>
				  
				  
				  <div class="tab-pane" id="opt3">
					<form role = "form" action="" method="post">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<button type="submit" name="delete" class="btn btn-danger">Удалить</button>
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
			
		
	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
  </body>
</html>