<?php
include_once 'connect.php';

//извлечение новостей из базы
$question = mysqli_query($link, "
	SELECT *
	FROM `questions`
	ORDER BY `id` DESC
	") or exit(mysqli_error());

if(isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);	
}		


//удаление отмеченных тем для голосования из базы
if(isset($_POST['delete'])&& isset($_POST['ids'])) {
	foreach($_POST['ids'] as $k=>$v){
		$_POST['ids'][$k] = (int)$v;
	}
	
	$ids = implode(',',$_POST['ids']);
	mysqli_query($link, "
	DELETE FROM `questions`
	WHERE `id` IN (".$ids.")
	") or exit(mysqli_error());
	
	$_SESSION['info'] = 'Темы для голосований были удалены';
	header('Location: history.php');
	exit();
}


//удаление темы для голосования из базы
if(isset($_GET['action']) && $_GET['action'] == 'delete') {
	mysqli_query($link, "
	DELETE FROM `questions`
	WHERE `id` = ".$_GET['id']."
	") or exit(mysqli_error());
	
	$_SESSION['info'] = 'Новость была удалена';
	header('Location: history.php');
	exit();	
}

//выборка данных из базы между датами
if (isset($_POST['from'],$_POST['to'],$_POST['show'])){
    $from = $_POST['from'];
    $to = $_POST['to'] ;
    	
	$result = mysqli_query($link, "
	SELECT * FROM `questions` 
	WHERE `date` BETWEEN CAST('".$from."' AS DATE) and ADDDATE(CAST('".$to."' AS DATE),INTERVAL 1 DAY) 
	") or exit(mysqli_error());
	
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
    <title>История голосований</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
  </head>
  <body>
	<ul class="nav nav-pills"> 
	  <li role="presentation"><a href="index.php">Настройка</a></li> 
	  <li role="presentation"><a href="options.php">Опции графиков </a></li> 
	  <li role="presentation" class="active"><a href="history.php">История</a></li> 
	  <li role="presentation"><a href="news.php">Новости</a></li> 
	</ul>
	
	<br><br>	
	
<!-- Вывод инфосообщения -->	
<?php if(isset($info)) { ?>
	<h2 style="color:red; padding-left:15px;"><?php echo $info; ?></h2>
<?php } ?>


	<div class = "container-fluid">
		<form role = "form" action="" method="post">
									
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label>Дата начала</label>
						<input class = "form-control" type="date" name="from" value="<?php $POST['from']; ?>">
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="form-group">
						<label>Дата окончания</label>
						<input class = "form-control" type="date" name="to" value="<?php $POST['to']; ?>">
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
    <script src="js/bootstrap.js"></script>
  </body>
</html>