<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';


//загрузка файла логотипа на сервер
if(isset($_POST['subUploadfile'])){
	if ($_FILES){
		$name = $_FILES['filename']['name'];
		switch($_FILES['filename']['type']){
			case 'image/jpeg': $ext = 'jpg'; break;
			case 'image/gif': $ext = 'gif'; break;
			case 'image/png': $ext = 'png'; break;
			case 'image/tiff': $ext = 'tif'; break;
			default: $ext = ''; break;
		}
	if ($ext){
		$n = "../img/logo.$ext";
		$_SESSION['LOGO'] = $n;
		move_uploaded_file($_FILES['filename']['tmp_name'], $n);
		} else MessageSend(1, 'Неприемлемый файл изображения.');
	} else MessageSend(1, 'Загрузки изображения не произошло.');
}	


//вывод сайта для зарегистрированных пользователей
if (!isset($_SESSION['USER_LOGIN_IN']) or $_SESSION['USER_LOGIN_IN'] =0 ) {
	MessageSend(1, 'Требуется регистрация пользователя.');
} elseif (isset($_SESSION['USER_LOGIN_IN']) && $_SESSION['USER_LOGIN_IN'] =1){
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Настройки голосования</title>

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
          <ul class="nav navbar-nav">
            <li><a href="main.php">Главная</a></li>
            <li><a href="history.php">История</a></li>
			<li><a href="news.php">Новости</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Настройки<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="admin_polls.php">Интернет голосование</a></li>
                <li class="divider"></li>
				<li><a href="options.php">Опции графиков</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signin.php">Вход</a></li>
            <?php Menu(); ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

		
<div class = "container">	
<!--info --> 
<?php MessageShow(); ?>

	<div class = "row">
		<div class="col-md-12">	
			<div class = "tabs">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#opt1" data-toggle="tab">Круговая_3d</a></li>
				  <li><a href="#opt2" data-toggle="tab">Столбцы</a></li>
				  <li><a href="#opt3" data-toggle="tab">Круговая+Столбцы</a></li>
				  <li><a href="#opt4" data-toggle="tab">Сводный индикатор</a></li>
				</ul>

					<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane active" id="opt1">
					<form role = "form" action="" method="post">
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Заголовок</label>
									<input class = "form-control" type="text" name="title" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Ширина, px</label>
									<input class = "form-control" type="text" name="width" value="<?php echo @$_POST['width']; ?>">
								</div>
							</div>	
								
							<div class="col-md-2">	
								<div class="form-group">
									<label>Высота, px</label>
									<input class = "form-control" type="text" name="height" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Отступ слева, px</label>
									<input class="form-control" type="text" name="chartArea_left" size="10" value="">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Отступ сверху, px</label>
									<input class="form-control" type="text" name="chartArea_top" size="10" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Размер шрифта, px</label>
									<input class="form-control" type="text" name="" size="10" value="">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Цвет шрифта</label>
									<input class="form-control" type="text" name="" size="10" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="checkbox">
									<label>
									  <input type="checkbox"> легенда
									</label>
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Позиция легенды</label>
									<select class = "form-control" name="selectoptions_legend">
										<option value="option1">Снизу</option>
										<option value="option1">Сверху</option>
										<option value="option2">Слева</option>
										<option value="option3">Справа</option>
										<option value="option4">Отсутствует</option>
									</select>
								</div>
							</div>
						</div>
								
						<div class="row">		
							<div class="col-md-2">
								<div class="checkbox">
									<label>
									  <input type="checkbox" checked> в 3D
									</label>
								</div>
							</div>	
						</div>		
						
						<div class="row">		
							<div class="col-md-4">
								<div class="form-group">
									<label>Индивидуальные настройки</label>
									  <textarea class="form-control" rows="10"></textarea>
								</div>
							</div>	
						</div>	

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<button type="submit" name="submit" class="btn btn-warning">Применить</button>
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
									<label>Заголовок</label>
									<input class = "form-control" type="text" name="title" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Подзаголовок</label>
									<input class = "form-control" type="text" name="subtitle" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Ширина, px</label>
									<input class = "form-control" type="text" name="width" value="">
								</div>
							</div>	
								
							<div class="col-md-2">	
								<div class="form-group">
									<label>Высота, px</label>
									<input class = "form-control" type="text" name="height" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Отступ слева, px</label>
									<input class="form-control" type="text" name="chartArea_left" size="10" value="">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Отступ сверху, px</label>
									<input class="form-control" type="text" name="chartArea_top" size="10" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Размер шрифта, px</label>
									<input class="form-control" type="text" name="" size="10" value="">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Цвет шрифта</label>
									<input class="form-control" type="text" name="" size="10" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Фоновый цвет</label>
									<input class="form-control" type="text" name="backgroundColor" size="10" value="">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Цвет диаграммы</label>
									<input class="form-control" type="text" name="backgroundColor_fill" size="10" value="">
								</div>
							</div>
						</div>
						
						
						<div class="row">
							<div class="col-md-2">
								<div class="checkbox">
									<label>
									  <input type="checkbox"> легенда
									</label>
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Позиция легенды</label>
									<select class = "form-control" name="selectoptions_legend">
										<option value="option1">Снизу</option>
										<option value="option1">Сверху</option>
										<option value="option2">Слева</option>
										<option value="option3">Справа</option>
										<option value="option4">Отсутствует</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="row">		
							<div class="col-md-4">
								<div class="form-group">
									<label>Индивидуальные настройки</label>
									  <textarea class="form-control" rows="10"></textarea>
									
								</div>
							</div>	
						</div>	
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<button type="submit" name="submit" class="btn btn-warning">Применить</button>
								</div>
							</div>
						</div>
					
					</form>
				  		  
				  </div>
				  
				  <div class="tab-pane" id="opt3">
					<form role = "form" action="" method="post">
						<fieldset>
							<legend style ="color: green">Круговая</legend>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Заголовок</label>
									<input class = "form-control" type="text" name="title" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Ширина, px</label>
									<input class = "form-control" type="text" name="width" value="">
								</div>
							</div>	
								
							<div class="col-md-2">	
								<div class="form-group">
									<label>Высота, px</label>
									<input class = "form-control" type="text" name="height" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Отступ слева, px</label>
									<input class="form-control" type="text" name="chartArea_left" size="10" value="">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Отступ сверху, px</label>
									<input class="form-control" type="text" name="chartArea_top" size="10" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Размер шрифта, px</label>
									<input class="form-control" type="text" name="" size="10" value="">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Цвет шрифта</label>
									<input class="form-control" type="text" name="" size="10" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="checkbox">
									<label>
									  <input type="checkbox"> легенда
									</label>
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Позиция легенды</label>
									<select class = "form-control" name="selectoptions_legend">
										<option value="option1">Снизу</option>
										<option value="option1">Сверху</option>
										<option value="option2">Слева</option>
										<option value="option3">Справа</option>
										<option value="option4">Отсутствует</option>
									</select>
								</div>
							</div>
						</div>
								
						<div class="row">		
							<div class="col-md-2">
								<div class="checkbox">
									<label>
									  <input type="checkbox" checked> в 3D
									</label>
								</div>
							</div>	
						</div>		
						
						<div class="row">		
							<div class="col-md-4">
								<div class="form-group">
									<label>Индивидуальные настройки</label>
									  <textarea class="form-control" rows="10"></textarea>
								</div>
							</div>	
						</div>	

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<button type="submit" name="submit" class="btn btn-warning">Применить</button>
								</div>
							</div>
						</div>
						
						</fieldset>
					</form>
					
					<form role = "form" action="" method="post">
						<fieldset>
							<legend style ="color: green">Столбцы</legend>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Заголовок</label>
									<input class = "form-control" type="text" name="title" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Подзаголовок</label>
									<input class = "form-control" type="text" name="subtitle" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Ширина, px</label>
									<input class = "form-control" type="text" name="width" value="">
								</div>
							</div>	
								
							<div class="col-md-2">	
								<div class="form-group">
									<label>Высота, px</label>
									<input class = "form-control" type="text" name="height" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Отступ слева, px</label>
									<input class="form-control" type="text" name="chartArea_left" size="10" value="">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Отступ сверху, px</label>
									<input class="form-control" type="text" name="chartArea_top" size="10" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Размер шрифта, px</label>
									<input class="form-control" type="text" name="" size="10" value="">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Цвет шрифта</label>
									<input class="form-control" type="text" name="" size="10" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Фоновый цвет</label>
									<input class="form-control" type="text" name="backgroundColor" size="10" value="">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Цвет диаграммы</label>
									<input class="form-control" type="text" name="backgroundColor_fill" size="10" value="">
								</div>
							</div>
						</div>
						
						
						<div class="row">
							<div class="col-md-2">
								<div class="checkbox">
									<label>
									  <input type="checkbox"> легенда
									</label>
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label>Позиция легенды</label>
									<select class = "form-control" name="selectoptions_legend">
										<option value="option1">Снизу</option>
										<option value="option1">Сверху</option>
										<option value="option2">Слева</option>
										<option value="option3">Справа</option>
										<option value="option4">Отсутствует</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="row">		
							<div class="col-md-4">
								<div class="form-group">
									<label>Индивидуальные настройки</label>
									  <textarea class="form-control" rows="10"></textarea>
								</div>
							</div>	
						</div>	
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<button type="submit" name="submit" class="btn btn-warning">Применить</button>
								</div>
							</div>
						</div>
						
						</fieldset>
					</form>
				  </div>
				  
				  
<!--Сводный индикатор -->				  
				<div class="tab-pane" id="opt4">
					<form enctype="multipart/form-data" role = "form" action="options.php" method="post">
						
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Логотип:</label><br>
									<?php if(isset($n)){
									echo "<img src = '$n' width='250' alt='logo'><br>";}?>
									<br><input type="file" name="filename"> 
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<button type="submit" name="subUploadfile" class="btn btn-warning">Загрузить</button>
								</div>
							</div>
						</div>
					
					</form>
					
					<form role = "form" action="progress.php" method="post">					
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Логотип</label>
									<select class = "form-control" name="selectPanelLogo">
										<option value="logo1">Показывать</option>
										<option value="logo2">Не показывать</option>
									</select>
								</div>
							</div>
						
							<div class="col-md-4">
								<div class="form-group">
									<label>Правая панель</label>
									<select class = "form-control" name="selectPanelRight">
										<option value="right1">Показывать</option>
										<option value="right2">Не показывать</option>
									</select>
								</div>
							</div>
						</div>
						
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Панель гостей</label>
									<select class = "form-control" name="selectPanelGuests">
										<option value="guest0">Нет гостей</option>
										<option value="guest1">Один гость</option>
										<option value="guest2">Два гостя</option>
									</select>
								</div>
							</div>
						
							<div class="col-md-4">
								<div class="form-group">
									<label>Панель голосования</label>
									<select class = "form-control" name="selectPanelVote">
										<option value="vote1">Показывать</option>
										<option value="vote2">Не показывать</option>
									</select>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Страна</label>
									<select class = "form-control" name="selectCountry">
										<option value="0">Выберите страну</option>
										<option value="1" selected>Украина</option>
										<option value="2">США</option>
									</select>
								</div>
							</div>
						
							<div class="col-md-4">
								<div class="form-group">
									<label>Телефон №1</label>
									<select class = "form-control" name="selectPhone1">
										<option value="">Выберите телефон</option>
										<option value="+38(093)14-20-999" selected>+38(093)14-20-999</option>
										<option value="+38(099)14-20-999">+38(099)14-20-999</option>
									</select>
								</div>
							</div>
								
						</div>	

						<div class="row">		
								
							<div class="col-md-4 col-md-offset-4">
								<div class="form-group">
									<label>Телефон №2</label>
									<select class = "form-control" name="selectPhone2">
										<option value="">Выберите телефон</option>
										<option value="+38(093)14-20-999">+38(093)14-20-999</option>
										<option value="+38(099)14-20-999" selected>+38(099)14-20-999</option>
									</select>
								</div>
							</div>
								
							<!--<div class="col-md-3">
									<div class="form-group">
										<label>Телефон №3</label>
										<select class = "form-control" name="selectPhone3">
											<option value="">Выберите телефон</option>
											<option value="">380505555555</option>
											<option value="">380506666666</option>
										</select>
									</div>
								</div>
							</div> -->
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<button type="submit" name="subOpt4" class="btn btn-warning">Применить</button>
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