<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';

if(isset($_POST['id'])){
	$_SESSION['QUESTION_ID'] = $_POST['id'];
}else{
	$_SESSION['QUESTION_ID'] = '';
}
?>


<!DOCTYPE html>
<html lang="en">
<html>
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Опрос пользователей</title>

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
			
            <?php MenuCabinet();?>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>


<div class = "container">
<!--info --> 
<?php MessageShow(); ?>
<br>
	<div class = "row" style ="font-size: 20px;">
		<div class="col-md-12">	
		
			<form class="form-horizontal" action="golos_result.php" method="post">
				<br>
				
<?php
if(isset($_POST['id']) && !empty($_POST['id'])){
$result = mysqli_query($db, "SELECT * 
	FROM `questions_opros` 
	WHERE `id` = ".(int)$_POST['id']." 
	LIMIT 1 
	");

	if (isset($result)) {
		while($row = mysqli_fetch_assoc($result)) {
		echo $row['question'];
		}
	}
}
?>				
<br><br>
			
<?php
if(isset($_POST['id']) && !empty($_POST['id'])){
$res = mysqli_query($db, "SELECT * 
	FROM `answers_opros` 
	WHERE `question_id` = ".(int)$_POST['id']." 
	LIMIT 50 
	");

if (isset($res)) {
	while($row = mysqli_fetch_assoc($res)) {
	echo "
	<div class='radio'>
		<label>
			<input type='radio' name='voice' value='".$row['id']."'>
			".$row['answer']."  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; или звонок на номер &nbsp;&nbsp;&nbsp; ".$row['phone']."
		</label>
	</div>
	
	";
	
	}
}
}


?>
			
					
					
					<br><br>
					
					<div class="form-group">
						<div class="col-md-4 col-md-offset-2">
							<button type="submit" name="subFinish" class="btn btn-success">Проголосовать</button>
						</div>
					</div>
							
					<div class="form-group">
						<div class="col-md-4 col-md-offset-2">
							<a href="info.php" class="btn btn-warning" role="button">Вернуться</a>
						</div>
					</div>
				
			</form>	
			<hr>
			
			
		</div>
		
	</div>		
		
		
</div>	<!-- /container -->

	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>


	
  </body>
</html>
