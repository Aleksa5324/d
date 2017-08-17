<?php
include_once 'connect.php';


//вывод сайта для зарегистрированных пользователей
if (!isset($_SESSION['USER_LOGIN_IN']) or $_SESSION['USER_LOGIN_IN'] =0 ) {
	header ("Location:page/signin.php");
	exit();
} elseif (isset($_SESSION['USER_LOGIN_IN']) && $_SESSION['USER_LOGIN_IN'] =1){
	header ("Location:page/main.php");
	exit();

}
?>

