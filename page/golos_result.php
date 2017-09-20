<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';

//d($_POST,1);



if(isset($_POST['subFinish'], $_POST['voice'])){
	
	 $ip=$_SERVER['REMOTE_ADDR'];
	 $result=mysqli_query($db,"SELECT count(id) FROM opros_ip
		 WHERE question_opros_id='".$_SESSION['QUESTION_ID']."' and ip=INET_ATON('".$ip."') LIMIT 1");
	 $number=mysqli_fetch_array($result);
		 if ($number[0]==0) {
			$res=mysqli_query($db,"INSERT INTO opros_ip (question_opros_id,ip,date)
				values ('".$_SESSION['QUESTION_ID']."',INET_ATON('".$ip."'), NOW())");
			$res=mysqli_query($db,"UPDATE answers_opros SET votes=(votes+1)
				WHERE id='".$_POST['voice']."' LIMIT 1");
			MessageSend(3,'Спасибо! Ваш голос принят');
		 }
		 else MessageSend(1,'Вы уже голосовали!');
	
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
		
			<form class="form-horizontal" action="" method="post">
				
							
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
