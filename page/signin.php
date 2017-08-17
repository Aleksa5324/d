<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';

//ULogin(0); //страница для гостей

//авторизация
if(isset($_POST['subSign'], $_POST['login'], $_POST['password'])) {
	$_POST['login'] = FormChars($_POST['login']);
	$_POST['password'] = GenPass(FormChars($_POST['password']), $_POST['login']);

if (!$_POST['login'] or !$_POST['password']) MessageSend(1, 'Невозможно обработать форму.');
		
$row = mysqli_fetch_assoc(mysqli_query($db, "SELECT `password`, `active` FROM `users` WHERE `login` = '$_POST[login]'"));	
if ($row['password'] != $_POST['password']) MessageSend(1,'Неверный логин или пароль.');	
if ($row['active'] 	== 0) MessageSend(1,'Аккаунт пользователя <b>'.$_POST['login'].'</b> не подтвержден.');	

$row = mysqli_fetch_assoc(mysqli_query($db, "SELECT `id`, `name`, `regdate`, `email`, `password`, `login` FROM `users` WHERE `login` = '$_POST[login]'"));	
$_SESSION['USER_LOGIN'] = $row['login'];
$_SESSION['USER_PASSWORD'] = $row['password'];

$_SESSION['USER_ID'] = $row['id'];
$_SESSION['USER_NAME'] = $row['name'];
$_SESSION['USER_REGDATE'] = $row['regdate'];
$_SESSION['USER_EMAIL'] = $row['email'];
$_SESSION['USER_LOGIN_IN'] = 1;

if(isset($_POST['remember'])) setcookie('user', $_POST['password'], strtotime('+10 days'), '/');
	
exit(header('Location: cab.php'));	

}



if(isset($_POST['remember'])) {
	setcookie('user', $_POST['password'], strtotime('+10 days'), '/');
	
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
  

    <title>Вход в личный кабинет</title>

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

      <form class="form-signin" role="form" method ="POST" action ="signin.php">
        <h2 class="form-signin-heading">Авторизация на сайте</h2>
        <input type="login" name ="login" class="form-control" placeholder="Логин" maxlength ="10" pattern ="[A-Za-z-0-9]{3,10}" title="Не менее 3 и не более 10 латинских символов или цифр." required autofocus>
        <input type="password" name ="password" class="form-control" placeholder="Пароль" maxlength ="15" pattern ="[A-Za-z-0-9]{5,15}" title="Не менее 5 и не более 15 латинских символов или цифр." required>
        <label class="checkbox">
          <input type="checkbox"  name ="remember" value="remember"> запомнить меня
        </label>
		<p>	<a href="restore.php">Забыли свой пароль?</a></p>
			У вас нет аккаунта? <a href="reg.php">Регистрация</a><br>
		<button class="btn btn-lg btn-primary btn-block"  name ="subSign" type="submit">Войти</button>
		<button class="btn btn-lg btn-danger btn-block " type="reset">Очистить</button>
		
      </form>

    </div> <!-- /container -->


   
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
  </body>
</html>