<?php

if(!empty($_POST['titul_news'])) {
	if (isset($_POST['titul_news']) && isset($_POST['addnews'])) {
		$titul_news = $_POST['titul_news'];
		$fp = fopen("page/news.txt", "a+"); // Открываем файл в режиме записи
		$mytext = $titul_news." *** \r\n"; // Исходная строка
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo '<p style="color: red"> Новости успешно обновлены.</p>';
		else echo 'Ошибка при записи в файл.';
		fclose($fp); //Закрытие файла
	}
}

if(isset($_POST['autodelete']) && !empty($_POST['autodelete'])){
	$fp = file("page/news.txt");
	$count = count($fp);
	if($count >10) {	//если кол-во строк в файле более 10, то удаляем 0 строку
		$num_stroka = 0; //Удалим 0 строку из файла
		$file = file("page/news.txt"); // Считываем весь файл в массив

		for($i = 0; $i < sizeof($file); $i++)
		if($i == $num_stroka) unset($file[$i]);

		$fp = fopen("page/news.txt", "w");
		fputs($fp, implode("", $file));
		fclose($fp);
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
				  <li class="active"><a href="#opt1" data-toggle="tab">Управление новостями</a></li>
				  <li><a href="#opt2" data-toggle="tab">RSS</a></li>
				  <li><a href="#opt3" data-toggle="tab">MySQL</a></li>
				</ul>

					<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane active" id="opt1">
					<form role = "form" action="news.php" method="post">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
								<?php echo 'Количество новостей: '.@$count;?> <br><br>
									<label>Заголовок новости</label>
									<input class = "form-control" type="text" name="titul_news" value="">
									<input type="checkbox" name="autodelete" value="a1" checked>Использовать автоудаление старых новостей
								</div>
							</div>
						</div>
			
						<div class="row">		
							<div class="col-md-4">
								<p>Внимание! Все текущие новости находятся в файле "/page/new.txt"</p>
								<p>Удаленные новости хранятся в файле "/page/old_new.txt"</p>
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
					
					<form role = "form" action="delete_news.php" method="post">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<button type="submit" name="del" class="btn btn-danger">Удалить</button>
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
									<button type="submit" name="editnews" class="btn btn-warning">Сохранить</button>
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
										<button type="submit" name="delete" class="btn btn-danger">Просмотреть</button>
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