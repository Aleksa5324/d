<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';

//ULogin(0); //страница для гостей

// регистрация пользователя
if(isset($_POST['subReg'], $_POST['login'], $_POST['email'], $_POST['password'], $_POST['name'])) {
	$_POST['login'] = FormChars($_POST['login']);
	$_POST['email'] = FormChars($_POST['email']);
	$_POST['password'] = GenPass(FormChars($_POST['password']), $_POST['login']);
	$_POST['name'] = FormChars($_POST['name']);
			
if (!$_POST['login'] or !$_POST['email'] or !$_POST['password'] or !$_POST['name'])	MessageSend(1, 'Невозможно обработать форму.');
		
$row = mysqli_fetch_assoc(mysqli_query($db, "SELECT `login` FROM `users` WHERE `login` = '$_POST[login]'"));	
if ($row['login']) MessageSend(1,'Логин <b>'.$_POST['login']. '</b> уже используется.');

$row = mysqli_fetch_assoc(mysqli_query($db, "SELECT `email` FROM `users` WHERE `email` = '$_POST[email]'"));	
if ($row['email']) MessageSend(1,'E-mail <b>'.$_POST['email']. '</b> уже используется.');

mysqli_query($db, "INSERT INTO `users` VALUES ('', '$_POST[login]', '$_POST[password]', '$_POST[name]', NOW(), '$_POST[email]', 0)");	

$code = substr(base64_encode($_POST['email']), 0, -1);
$code = str_replace('=', '', base64_encode($_POST['email']));

mail($_POST['email'],'Регистрация на сайте "ГОЛОСОВАНИЕ"', 'Ссылка для активации: '.URL_SITE.'page/reg.php?&code='.substr($code, -5).substr($code, 0, -5), 'From: info@mail.com');
MessageSend(3, 'Регистрация аккаунта успешно завершена. На указанный E-mail <b>' . $_POST['email'].'</b> отправлено письмо для подтверждения регистрации.');
}


//подтверждение e-mail
elseif(isset($_GET['code'])) {
	if (!$_SESSION['USER_ACTIVE_EMAIL']) {
	$email = base64_decode(substr($_GET['code'], 5).substr($_GET['code'], 0, 5));
	if (strpos($email, '@') !== false) {
	mysqli_query($db, "UPDATE `users` SET `active` = 1 WHERE `email` = '$email'");
	$_SESSION['USER_ACTIVE_EMAIL'] = $email;
	MessageSend(3, 'E-mail <b>' .$email. '</b> подтвержден.', 'signin.php');	
	} else MessageSend(1, 'E-mail не подтвержден.', 'reg.php' );
	} else MessageSend(1, 'E-mail <b>'.$_SESSION['USER_ACTIVE_EMAIL']. '</b> уже подтвержден.', 'reg.php');	
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
  

    <title>Регистрация пользователя</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="../style.css" />
    <link rel="stylesheet" href="../css/signin.css" />

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

      <form class="form-signin" role="form" method ="POST" action ="reg.php">
        <h2 class="form-signin-heading">Регистрация на сайте</h2>
        <input type="text" name ="login" class="form-control" placeholder="Логин" maxlength ="10" pattern ="[A-Za-z-0-9]{3,10}" title="Не менее 3 и не более 10 латинских символов или цифр." required autofocus>
		<input type="password" name ="password" class="form-control" placeholder="Пароль" maxlength ="15" pattern ="[A-Za-z-0-9]{5,15}" title="Не менее 5 и не более 15 латинских символов или цифр." required autofocus>
		<input type="email" name ="email" class="form-control" placeholder="E-mail"  required autofocus>
		<input type="text" name ="name" class="form-control" placeholder="Имя" required autofocus style="margin-bottom: 5px;" >
		<button class="btn btn-lg btn-primary btn-block" type="submit" name ="subReg">Зарегистрировать</button>
		<button class="btn btn-lg btn-danger btn-block "  type="reset">Очистить</button>
      </form>

    </div> <!-- /container -->


  
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
  </body>
</html>