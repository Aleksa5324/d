<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';



if(isset($_POST['question_o'])){
	$_SESSION['QUESTION_ID'] = trim($_POST['question_o']);
	
	//получаем вопрос по ID, который пришел в $_POST['question_o']
	$res = mysqli_query($db, "SELECT * FROM `questions_opros` WHERE `id` = '".$_SESSION['QUESTION_ID']."' ");

	$row = mysqli_fetch_array($res);
	$_SESSION['QUESTION_O'] = $row['question'];
	
}


//выбор графика
if(isset($_POST['subOpros'],$_POST['chart'])){
	$chart = $_POST['chart'];
	
	if($chart == '1') {
		header("Location: piechart_o.php");
		exit();
	} elseif($chart == '2') {
		header("Location: columnchart_o.php");
		exit();
	}
}  

?>
