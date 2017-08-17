<?php
error_reporting(E_ALL);

include_once '../connect.php';
include_once '../lib/myFunction.php';

ULogin(0); //страница для гостей


//обработка восстановления пароля
if(!isset($_GET['code']) and substr(isset($_SESSION['RESTORE']), 0, 4) == 'wait') MessageSend(2,'Вы уже отправили заявку на восстановление пароля. Проверьте Ваш E-mail <b>'.HideEmail(substr($_SESSION['RESTORE'], 5)).'</b>', 'restore.php');

if(isset($_GET['code']) and substr($_SESSION['RESTORE'], 0, 4) != 'wait') MessageSend(2,'Ваш пароль раннее уже был изменен. Для входа используйте новый пароль <b>'.$_SESSION['RESTORE'].'</b>', 'signin.php');



if(isset($_GET['code'])) {
	$row = mysqli_fetch_assoc(mysqli_query($db, 'SELECT `email` FROM `users` WHERE `id` = '.str_replace(md5($row['email']), '', $_GET['code'])));	
	if (!$row['email']) MessageSend(1, 'Невозможно восстановить пароль.', 'signin.php');	
	$random = RandomString(8);
	$_SESSION['RESTORE'] = $random;
	mysqli_query($db, "UPDATE `users` SET `password` = '".GenPass($random, $row['login'])."' WHERE `login` = '$row[login]'");
	MessageSend(2, 'Пароль успешно изменен. Для входа используйте новый пароль <b>'.$random.'</b>.', 'signin.php');		
}

	
// отправка
if(isset($_POST['subRest'])) {
	$_POST['login'] = FormChars($_POST['login']);
		
if (!$_POST['login']) MessageSend(1, 'Невозможно обработать форму.');
		
$row = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$_POST[login]'"));	
if (!$row['login']) MessageSend(1,'Пользователь не найден.');

mail($row['email'],'Сайт "ГОЛОСОВАНИЕ"', 'Ссылка для восстановления: '.URL_SITE.'page/restore.php?&code='.md5($row['email']).$row['id'], 'From: info@mail.com');

$_SESSION['RESTORE'] = 'wait_'.$row['email'];
MessageSend(2, 'На Ваш E-mail <b>' . HideEmail($row['email']).'</b> отправлено подтверждение смены пароля.', 'restore.php');
}	
	
	
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  

    <title>Восстановление пароля</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="../style.css" />
    <link href="../css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
  
  

    <div class="container">
	
	<!--info --> 
	<?php MessageShow(); ?>

      <form class="form-signin" role="form" method ="POST" action ="restore.php">
        <h2 class="form-signin-heading">Восстановление пароля</h2>
        <input type="login" name ="login" class="form-control" placeholder="Логин" maxlength ="10" pattern ="[A-Za-z-0-9]{3,10}" title="Не менее 3 и не более 10 латинских символов или цифр." required autofocus style="margin-bottom: 5px;">
               
		<button class="btn btn-lg btn-primary btn-block"  name ="subRest" type="submit">Восстановить</button>
		<button class="btn btn-lg btn-danger btn-block " type="reset">Очистить</button>
		
      </form>

    </div> <!-- /container -->


   
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
  </body>
</html>