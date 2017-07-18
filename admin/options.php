<!DOCTYPE html>
<html lang="en">
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
		<li role="presentation" class="active"><a href="options.php">Опции графиков </a></li> 
		<li role="presentation"><a href="history.php">История</a></li> 
	</ul>
	
	<br><br>	
<div class = "container-fluid">	
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
						</fieldset>
					</form>
				  
				  </div>
				  <div class="tab-pane" id="opt4">Здесь настройки диаграммы Сводный индикатор......</div>
				</div>
			</div>
		</div>		
	</div>	
</div>	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
  </body>
</html>
