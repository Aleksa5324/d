<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';


//удаление вопроса из базы
if(isset($_GET['action']) && $_GET['action'] == 'delete') {
	mysqli_query($db, "
	DELETE FROM `answers_opros`
	WHERE `id` = ".$_GET['id']."
	") or exit(mysqli_error());
	
	MessageSend(3,'Вопрос был удален');
}


//обновление данных
if(isset($_POST['edit'],$_POST['active'])) {
	
	foreach($_POST as $k=>$v) {
	$_POST[$k] = trim($v);
	}
	
    mysqli_query($db,"
		UPDATE `questions_opros` SET
			`active`= '$_POST[active]',
			`question`= '$_POST[question]'
			WHERE `id` = ".(int)$_GET['id']."
	") or exit(mysqli_error($db));
	
	MessageSend(3,'Запись была изменена');
}


//получаем данные вопроса по ID
$questions = mysqli_query($db,"
		SELECT * 
		FROM `questions_opros` 
		WHERE `id` = ".(int)$_GET['id']."
		LIMIT 1
	") or exit(mysqli_error());
	
/*
if(!mysqli_num_rows($questions)) {
	MessageSend(1,'Данного вопроса не существует');
}
*/

$row = mysqli_fetch_assoc($questions);

if(isset($_POST['active'])) {
	$row['active'] = $_POST['active'];
	
}


if(isset($_GET['id'])) {
	$question_id = (int)$_GET['id'];
	
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
    <title>Редактрование пользователя</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../style.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
<script>
function areYuoSure(){
	return confirm('Вы уверены, что хотите удалить?');
}
</script>
  
  
  </head>
  <body>

	<div class = "container-fluid">	
		<div class = "row">
			<div class="col-md-12">	
				<form class="form-horizontal" action="" method="post">
						<br>
						<fieldset>
						<legend style="color: green">Редактирование вопроса для проведения опросов пользователей</legend>
						
							<div class="form-group">
								<label class="col-sm-2 control-label">ID</label>
								<div class="col-sm-10">
								  <p class="form-control-static"><?php echo $row['id']; ?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Вопрос</label>
								<div class="col-sm-4">
								  <input type="text" name ="question" class="form-control" placeholder="<?php echo $row['question']; ?>" autofocus style="margin-bottom: 5px;" value="<?php echo $row['question']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Дата создания</label>
								<div class="col-sm-10">
								  <p class="form-control-static"><?php echo $row['date_created']; ?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Дата модификации</label>
								<div class="col-sm-10">
								  <p class="form-control-static"><?php echo $row['date_modification']; ?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Статус</label>
								<div class="col-sm-4">
								  <input type="text" name ="active" class="form-control" placeholder="<?php echo $row['active']; ?>" required autofocus style="margin-bottom: 5px;" value="">
								  <p>0 - не активный;  1 - активный</p>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-4 col-md-offset-2">
									<button type="submit" name="edit" class="btn btn-success">Сохранить</button>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-4 col-md-offset-2">
									<a href="options_oprosy.php" class="btn btn-warning" role="button">Вернуться</a>
								</div>
							</div>
							
							
						
						</fieldset>	
				</form>	
				
				
				<div class="col-md-12">	
				
<!--info --> 
<?php MessageShow(); ?>
<br>				
		<br>
		<p><b style="color: #cd66cc;">Список ответов на вопрос:</b></p>
		
		<table class="table table-striped">
			</tbody>
				<tr >
					<th>ID</th>	
					<th>Ответ</th>
					<th>ID вопроса</th>
					<th>Телефон для голос-ния</th>
					<th>Действие</th>
				</tr>
				
								
			<?php 
				$result = mysqli_query($db, "SELECT * 
				FROM `answers_opros` 
				WHERE `question_id` = ".(int)$_GET['id']." 
				LIMIT 50 
				");
			
				if (isset($result)) {
				while($row = mysqli_fetch_assoc($result)) {
				
				echo '<tr>';
					echo '<td>' . $row['id'] . '</td>';
					echo '<td>' . $row['answer'] . '</td>';
					echo '<td>' . $row['question_id'] . '</td>';
					echo '<td>' . $row['phone'] . '</td>';
					echo "<td><a href='add_answer_opros.php?action=add&question_id={$row['question_id']} '>ДОБАВИТЬ   ||</a> <a href='edit_answer_opros.php?action=edit&id={$row['id']} '>ИЗМЕНИТЬ   ||</a><a href='edit_answer_opros.php?page=edit_answer_opros&action=delete&id={$row['id']}' onClick='return areYuoSure();'> УДАЛИТЬ</a></td>";
				}
				}
			?>	
				</tr>							
			</tbody>	
		</table>	
		
		
		<a href="add_answer_opros.php" class="btn btn-success" role="button">Добавить новый</a>
		
		</div>
				
				
				
			</div>	
		</div>	
	</div>	
	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
  </body>
</html>