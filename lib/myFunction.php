<?php

//функция отладки. $die =1 - остановка работы сайта по умолчанию
function d($value = null, $die = 1) { 
	echo '<br />';
	echo 'Debug: <br /><pre>';
	print_r($value);
	echo '</pre>';
	
	if($die) die;
}


//функция  
function RandomString($p1) { 
$char = '0123456789abcdefghijklmnopqrstuvwxyz';
	for ($i = 0; $i < $p1; $i ++) $string .= $char[rand(0, strlen($char) - 1)];
	return $string;
}


//функция для скрытия домена почтовика
function HideEmail($p1) {
	$explode = explode('@', $p1);	
	return $explode[0].'@*****';
}



//функция для безопасности сайта при вводе данных с формы 
function FormChars($p1) { 
	return nl2br(htmlspecialchars(trim($p1), ENT_QUOTES), false);
}


//функция для шифрования пароля пользователя 
function GenPass ($p1, $p2) {
	return md5('barrikada'.md5('5'.$p1.'5').md5('5'.$p2.'5'));
}

//функция для вывода сообщений 
function MessageSend($p1, $p2, $p3 = '') {
	if($p1 == 1) $p1 = 'Ошибка';
	elseif ($p1 == 2) $p1 = 'Подсказка';
	elseif ($p1 == 3) $p1 = 'Информация';
	$_SESSION['message'] = '<div class = "MessageBlock"><b>'.$p1.'</b>: '.$p2.'</div>';
	if($p3) $_SERVER['HTTP_REFERER'] = $p3;
	exit (header('Location: '.$_SERVER['HTTP_REFERER']));
}

function MessageShow() {
	if(isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}


//функция для вывода сообщений в зависимости от вида полльзователей
function ULogin($p1) {
	if (isset($_SESSION['USER_LOGIN_IN'])) {
		if($p1 <= 0 and $_SESSION['USER_LOGIN_IN'] != $p1) MessageSend(1,'Данная страница доступна только для гостей.');
		elseif($_SESSION['USER_LOGIN_IN'] !=$p1) MessageSend(1,'Данная страница доступна только для зарегистрированных пользователей.');
	}	
}

//функция для вывода меню Кабинета для зарегистрированных пользователей
function MenuCabinet() {
	if (isset($_SESSION['USER_LOGIN_IN']) && $_SESSION['USER_LOGIN_IN'] =1){
		$menuCabinet = '<ul class="nav navbar-nav navbar-right">
			<li><a href="cab.php?&page=logout">Выйти</a></li>
			<li class="active"><a href="cab.php">КАБИНЕТ</a></li>
			<li><a href="#">Пользователь: <b>'.$_SESSION['USER_NAME'].'</b></a></li>
		</ul>';
		echo $menuCabinet;
	} 
}




/*функция парсинга элементов страниц другого сайта
$p1 = file_get_contents('адрес страницы сайта для парсинга');
$p2 - уникальный элемент страницы для начала поиска до нужного элемента парсинга
$p3 - уникальный элемент страницы для конца поиска после нужного элемента парсинга
*/
function Parse($p1, $p2, $p3){
	$num1 = strpos($p1, $p2);
	if ($num1 === false) return 0;
	$num2 = substr($p1, $num1);
	return strip_tags(substr($num2, 0, strpos($num2, $p3)));
}




?>

