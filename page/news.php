<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';


//Настройки вывода новостей
if(isset($_POST['optionsRadios'])) {
	$_SESSION['optionsRadios'] = $_POST['optionsRadios'];
	MessageSend(3,'Настройка вывода новостей сохранена. <a href="progress.php" style="color:white;">Перейти к новостям.</a>');
	//$_SESSION['info'] = 'Настройка вывода новостей сохранена. <a href="progress.php">Перейти к новостям.</a>';
}

if(isset($_POST['selectRss'],$_POST['submitRss'])){
	$selectRss = $_POST['selectRss'];
	
	if($selectRss == 'option1') {
		$_SESSION['urlRss'] = 'http://www.pravda.com.ua/rus/rss/view_news/';
	} elseif($selectRss == 'option2') {
		$_SESSION['urlRss'] = 'http://k.img.com.ua/rss/ru/all_news2.0.xml';
	} elseif($selectRss == 'option3') {
		$_SESSION['urlRss'] = 'https://www.rbc.ua/static/rss/newsline.rus.rss.xml';
	} elseif($selectRss == 'option4') {
		$_SESSION['urlRss'] = 'http://news.liga.net/news/rss.xml';
	}
}


//удаление новостей из файла
if(!empty($_POST['titul_news'])) {
	if (isset($_POST['titul_news']) && isset($_POST['addnews'])) {
		$titul_news = $_POST['titul_news'];
		$fp = fopen("news.txt", "a+"); // Открываем файл в режиме записи
		$mytext = $titul_news." *** \r\n"; // Исходная строка
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) {
			MessageSend(3,'Новости успешно обновлены', 'news.php');
			//$_SESSION['info'] = 'Новости успешно обновлены';
			//header('Location: news.php');
			//exit();	
		}
		else {
			MessageSend(1,'Ошибка при записи в файл', 'news.php');
			//$_SESSION['info'] = 'Ошибка при записи в файл';
			//header('Location: news.php');
			//exit();	
			fclose($fp); //Закрытие файла
		}
	}
}

if(isset($_POST['autodelete']) && !empty($_POST['autodelete'])){
	$fp = file("news.txt");
	$count = count($fp);
	if($count >10) {	//если кол-во строк в файле более 10, то удаляем 0 строку
		$num_stroka = 0; //Удалим 0 строку из файла
		$file = file("news.txt"); // Считываем весь файл в массив

		for($i = 0; $i < sizeof($file); $i++)
		if($i == $num_stroka) unset($file[$i]);

		$fp = fopen("news.txt", "w");
		fputs($fp, implode("", $file));
		fclose($fp);
	}	
}


//удаление отмеченных новостей из базы
if(isset($_POST['delete'])&& isset($_POST['ids'])) {
	foreach($_POST['ids'] as $k=>$v){
		$_POST['ids'][$k] = (int)$v;
	}
	
	$ids = implode(',',$_POST['ids']);
	mysqli_query($db, "
	DELETE FROM `news`
	WHERE `id` IN (".$ids.")
	") or exit(mysqli_error());
	
	MessageSend(3,'Новости были удалены' ,'news.php');
	//$_SESSION['info'] = 'Новости были удалены';
	//header('Location: news.php');
	//exit();
}


//удаление новости из базы
if(isset($_GET['action']) && $_GET['action'] == 'delete') {
	mysqli_query($db, "
	DELETE FROM `news`
	WHERE `id` = ".$_GET['id']."
	") or exit(mysqli_error());
	
	MessageSend(3,'Новость была удалена', 'news.php');
	//$_SESSION['info'] = 'Новость была удалена';
	//header('Location: news.php');
	//exit();	
}


//извлечение новостей из базы
$news = mysqli_query($db, "
	SELECT *
	FROM `news`
	ORDER BY `id` DESC
	") or exit(mysqli_error());



//вывод сайта для зарегистрированных пользователей
if (!isset($_SESSION['USER_LOGIN_IN']) or $_SESSION['USER_LOGIN_IN'] =0 ) {
	MessageSend(1, 'Требуется регистрация пользователя.');
} elseif (isset($_SESSION['USER_LOGIN_IN']) && $_SESSION['USER_LOGIN_IN'] =1){

		
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
	<!-- Custom styles for this template -->
    <link href="../css/navbar-fixed-top.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
  </head>
  <body>
  
  	<!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">ГОЛОСОВАНИЕ</a>
        </div>
        <div class="navbar-collapse collapse">
			<?php  
			if($_SESSION['USER_ACCESS'] == 0){
				include 'menu_user0.php'; 
			} elseif($_SESSION['USER_ACCESS'] == 3){
				include 'menu_user3.php'; 
			} else{
				include 'menu.php';
			}	
			?>
            <?php MenuCabinet(); ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	
<div class = "container">	
<!--info --> 
<?php MessageShow(); ?>



<form role = "form" action="" method="post">
Вывод новостей в бегущей строке:
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<div class="radio-inline">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
						Файл
					</label>
				</div>

				<div class="radio-inline">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
						RSS
					</label>
				</div>
				
				<div class="radio-inline">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
						SQL
					</label>
				</div>
				
				<button type="submit" name="ok" class="btn">Применить</button>
				
			</div>
		</div>
	</div>
</form>




	<div class = "row">
		<div class="col-md-12">	
			<div class = "tabs">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#opt1" data-toggle="tab">Файл</a></li>
				  <li><a href="#opt2" data-toggle="tab">RSS</a></li>
				  <li><a href="#opt3" data-toggle="tab">MySQL</a></li>
				</ul>

					<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane active" id="opt1">
					<form role = "form" action="news.php" method="post">
						<div class="row" style="padding-top:20px">
							<div class="col-md-4">
								<div class="form-group">
								<?php echo '<p style="color: #cd66cc;"><b>Количество новостей: '.@$count.'</b></p>';?> 
								<button type="submit" name="delete" class="btn btn-obnov"><span class="glyphicon glyphicon-refresh"></span>  Обновить</button>
								
								<br><br>
									<label>Заголовок новости</label>
									<input class = "form-control" type="text" name="titul_news" value="">
									<input type="checkbox" name="autodelete" value="a1" checked>Использовать автоудаление старых новостей
								</div>
							</div>
						</div>
			
						<div class="row">		
							<div class="col-md-4">
								<p>Внимание! Все текущие новости находятся в файле <b>"/page/new.txt"</b></p>
								<p>Удаленные новости хранятся в файле <b>"/page/old_new.txt"</b></p>
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
										<button type="submit" name="del" class="btn btn-danger"> Удалить </button>
									</div>
								</div>
							</div>
					</form>
				  </div>
				  
				  
				  <div class="tab-pane" id="opt2">
					<form role = "form" action="" method="post">
						<div class="row" style="padding-top:20px">
							<div class="col-md-4">
								<div class="form-group">
									<label>Источник ленты RSS</label>
									<select class = "form-control" name="selectRss">
										<option value="option1">Украинская правда</option>
										<option value="option2">Корреспондент</option>
										<option value="option3">РБК-Украина</option>
										<option value="option4">Лига.Новости</option>
									</select>
								</div>
							</div>
						</div>
							
						<div class="col-md-4">
							<div class="form-group">
								<button type="submit" name="submitRss" class="btn btn-warning">Применить</button>
							</div>
						</div>
						
											
					</form>
				  </div>
				  
				  
				  <div class="tab-pane" id="opt3">

					<div style = "padding-top:20px; padding-bottom:20px;">

						<b style="color: #cd66cc;">Все существующие новости:</b>	
						<hr>		
						<form action="" method="post">		
							<?php while($row = mysqli_fetch_assoc($news)) { ?>					
								<div>
									<div><input type="checkbox" name ="ids[]" value="<?php echo $row['id']; ?>"> <a href="news.php?page=news&action=delete&id=<?php echo $row['id']; ?>">УДАЛИТЬ</a> <a href="edit_news.php?action=edit&id=<?php echo $row['id']; ?>">ИЗМЕНИТЬ</a> <b><?php echo $row['title'];?></b> <span style="color:#777777; font-size:10px;"><?php echo '('.$row['date']. ')'; ?></span></div>
								</div>
								<hr>
							<?php } ?>	
							
							<a href="add_news.php" class="btn btn-success" role="button">Добавить</a>

							<button type="submit" name="delete" class="btn btn-danger">Удалить отмеченные записи</button>
						</form>
					</div>
				  </div>
				
				</div>
			</div>
		</div>		
	</div>	
</div>	
			
		
	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
	
	
	
<script>
  $(function() { 
    $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
    // сохраним последнюю вкладку
    localStorage.setItem('lastTab', $(this).attr('href'));
  });

  //перейти к последней вкладки, если она существует:
  var lastTab = localStorage.getItem('lastTab');
  if (lastTab) {
    $('a[href="' + lastTab + '"]').tab('show');
  }
  else
  {
    // установить первую вкладку активной если lasttab не существует
    $('a[data-toggle="tab"]:first').tab('show');
  }
});
</script>
	
	
  </body>
</html>

<?php } ?>