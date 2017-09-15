<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';

//извлечение новостей из базы
$question = mysqli_query($db, "
	SELECT *
	FROM `questions`
	ORDER BY `id` DESC
	") or exit(mysqli_error());
/*
if(isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);	
}		
*/

//удаление отмеченных тем для голосования из базы
if(isset($_POST['delete'])&& isset($_POST['ids'])) {
	foreach($_POST['ids'] as $k=>$v){
		$_POST['ids'][$k] = (int)$v;
	}
	
	$ids = implode(',',$_POST['ids']);
	mysqli_query($db, "
	DELETE FROM `questions`
	WHERE `id` IN (".$ids.")
	") or exit(mysqli_error());
	
	MessageSend(3,'Темы для голосований были удалены', 'history.php');
	//$_SESSION['info'] = 'Темы для голосований были удалены';
	//header('Location: history.php');
	//exit();
}


//удаление темы для голосования из базы
if(isset($_GET['action']) && $_GET['action'] == 'delete') {
	mysqli_query($db, "
	DELETE FROM `questions`
	WHERE `id` = ".$_GET['id']."
	") or exit(mysqli_error());
	
	MessageSend(3,'Новость была удалена', 'history.php');
	//$_SESSION['info'] = 'Новость была удалена';
	//header('Location: history.php');
	//exit();	
}

//выборка данных из базы между датами
if (isset($_POST['from'],$_POST['to'],$_POST['show'])){
    $from = $_POST['from'];
    $to = $_POST['to'] ;
    	
	$result = mysqli_query($db, "
	SELECT * FROM `questions` 
	WHERE `date` BETWEEN CAST('".$from."' AS DATE) and ADDDATE(CAST('".$to."' AS DATE),INTERVAL 1 DAY) 
	") or exit(mysqli_error());
	
} 



//вывод сайта для зарегистрированных пользователей
if (!isset($_SESSION['USER_LOGIN_IN']) or $_SESSION['USER_LOGIN_IN'] =0 ) {
	MessageSend(1, 'Требуется регистрация пользователя.');
} elseif (isset($_SESSION['USER_LOGIN_IN']) && $_SESSION['USER_LOGIN_IN'] =1){	
?>


<!DOCTYPE html>
<html lang="en">
<html>
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>История голосований</title>

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
            <?php MenuCabinet(); ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	



	<div class = "container">
<!--info --> 
<?php MessageShow(); ?>

		<form role = "form" action="" method="post">
									
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label>Дата начала</label>
						<input class = "form-control" type="date" name="from" value="<?php if(!empty($_POST['from'])) echo $_POST['from']; ?>">
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="form-group">
						<label>Дата окончания</label>
						<input class = "form-control" type="date" name="to" value="<?php if(!empty($_POST['to'])) echo $_POST['to']; ?>">
					</div>
				</div>
			</div>	
			
					
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<button type="submit" name="show" class="btn btn-warning">Найти</button>
					</div>
					<?php 
					if (isset($_POST['from'],$_POST['to'])){
					$_POST['from'] = strtotime($_POST['from']);
					$dateFrom = date('d.m.Y', $_POST['from']);
					$_POST['to'] = strtotime($_POST['to']);
					$dateTo = date('d.m.Y', $_POST['to']);
					
					echo '<p>Заданный период: с <b>'.$dateFrom. ' по ' .$dateTo. '</b></p>';
					}
					?>
				</div>
			</div>

			
			<table class="table table-striped">
			</tbody>
				<tr >
					<th style ="width:100px;">ID</th>
					<th>Дата</th>	
					<th>Тема</th>
				</tr>
				
								
			<?php 	
				if (isset($result)) {
				while($row = mysqli_fetch_assoc($result)) {
				$row['date'] = strtotime($row['date']);
				$row['date'] = date('d.m.Y', $row['date']);
				
				echo '<tr>';
					echo '<td>' . $row['id'] . '</td>';
					echo '<td>' . $row['date'] . '</td>';
					echo '<td>' . $row['question'] . '</td>';
				}
				}
			?>	
				</tr>							
				</tbody>	
			</table>	
			
			
		</form>
		
		
		
		<div style = "padding-top:20px; padding-bottom:20px;">

						<b style="color: #cd66cc;">Все существующие темы для голосования:</b>	
						<hr>
		<form action="" method="post">		
			<?php while($row = mysqli_fetch_assoc($question)) { ?>					
				<div>
					<div><input type="checkbox" name ="ids[]" value="<?php echo $row['id']; ?>"> <a href="history.php?page=history&action=delete&id=<?php echo $row['id']; ?>">УДАЛИТЬ</a> <a href="edit_question.php?action=edit&id=<?php echo $row['id']; ?>">ИЗМЕНИТЬ</a> <b><?php echo $row['question'];?></b> <span style="color:#777777; font-size:10px;"><?php echo '('.$row['date']. ')'; ?></span></div>
				</div>
				<hr>
				<?php } ?>	
							
				<a href="add_question.php" class="btn btn-success" role="button">Добавить</a>

				<button type="submit" name="delete" class="btn btn-danger">Удалить отмеченные записи</button>
		</form>
		
		
		
		
	</div>	
	
	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
  </body>
</html>

<?php } ?>