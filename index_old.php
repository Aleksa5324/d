

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
    <link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css" />
	
    
	
	
	<link href="css/timeTo.css" type="text/css" rel="stylesheet"/>
	
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
            <li class="active"><a href="main.php">Главная</a></li>
            <li><a href="history.php">История</a></li>
			<li><a href="news.php">Новости</a></li>
            <li class="dropdown">
              <a href="news.php" class="dropdown-toggle" data-toggle="dropdown">Настройки<b class="caret"></b></a>
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
            <!--<li class="active"><a href="page/cab.php">КАБИНЕТ</a></li>-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  
  
  
  
  
  
  
<div class = "container-fluid">
  <center>
	<div class = "zast">
		<p><a href="page/main.php"><img src="img/start.jpg" width="259" height="194" alt="lorem"></a> 
		Мы рады Вас приветствовать на нашем сайте!
		С помощью удобного инструмента Вы сможете оформлять телевизионный эфир.
		
		<p>
		
		</p>
		
		
	</center>
	</div>
</div>
		
  </body>
</html>