<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';


//удаление вопроса из базы
if(isset($_GET['action']) && $_GET['action'] == 'delete') {
	mysqli_query($db, "
	DELETE FROM `questions_opros`
	WHERE `id` = ".$_GET['id']."
	") or exit(mysqli_error());
	
	MessageSend(3,'Вопрос был удален');
}



//вывод сайта для зарегистрированных пользователей
if (!isset($_SESSION['USER_LOGIN_IN']) or $_SESSION['USER_LOGIN_IN'] =0 ) {
	MessageSend(1, 'Требуется регистрация пользователя.');
} elseif (isset($_SESSION['USER_LOGIN_IN']) && $_SESSION['USER_LOGIN_IN'] =1){
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Настройки голосования</title>

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
	
<script>
function areYuoSure(){
	return confirm('Вы уверены, что хотите удалить?');
}
</script>
	
	
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
<br>
	<div class = "row">
		<div class="col-md-12">	
			<div class = "tabs">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#opt1" data-toggle="tab">Вопросы</a></li>
				  <li><a href="#opt2" data-toggle="tab">Результаты опросов</a></li>
				</ul>

					<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="opt1">
						<div class = "row">
		<div class="col-md-12">	
			<br>
			<p><b style="color: #cd66cc;">Список вопросов для формирования опроса пользователей (для активации установите статус равный 1):</b></p>
			<p><b>ВАЖНО!</b> Для правильного отображения опроса необходимо, чтобы был установлен только один вопрос со статусом = 1, который и будет активный на данный момент.</p>
			<p>Для формирования ответов на вопрос выберите "ИЗМЕНИТЬ".</p>
			<br>
		
			<table class="table table-striped">
				<tbody>
					<tr>
						<th>ID</th>	
						<th>Вопрос</th>
						<th>Дата создания</th>
						<th>Дата модификации</th>
						<th>Статус</th>
						<th>Действие</th>
					</tr>
					
									
				<?php 
					$result = mysqli_query($db, 'SELECT * FROM `questions_opros` ORDER BY `active` DESC LIMIT 50');
				
					if (isset($result)) {
					while($row = mysqli_fetch_assoc($result)) {
					
					echo '<tr>';
						echo '<td>' . $row['id'] . '</td>';
						echo '<td>' . $row['question'] . '</td>';
						echo '<td>' . $row['date_created'] . '</td>';
						echo '<td>' . $row['date_modification'] . '</td>';
						echo '<td>' . $row['active'] . '</td>';
						echo "<td><a href='add_question_opros.php'>ДОБАВИТЬ   ||</a> <a href='edit_question_opros.php?action=edit&id={$row['id']} '>ИЗМЕНИТЬ   ||</a><a href='options_oprosy.php?page=options_oprosy&action=delete&id={$row['id']}' onClick='return areYuoSure();'> УДАЛИТЬ</a></td>";
					}
					}
				?>	
					</tr>							
				</tbody>	
			</table>	
		
		
		
		
		</div>
		
	</div>	
					</div>
					  
					  
					<div class="tab-pane" id="opt2">
						<br>
						<form action="graf_opros.php" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Укажите активный вопрос</label>
										<select class="form-control" name="question_o">
											<option value="">Выберите вопрос</option>
											
											<?php
											$res = mysqli_query($db, 'SELECT * FROM `questions_opros` WHERE `active` = 1 ');
											
											while ($row = mysqli_fetch_array($res)){
												echo "<option value=' ".$row['id']." ' selected>".$row['question']."</option>";
											}
																		
											?>							

										</select>
									</div>
								</div>
							</div>
							
							
							<div class="col-md-2">
								<div class="form-group">
								<br>
									<button type="submit" name ="subOpros" class="btn btn-warning">Результаты опроса</button>
								</div>
							</div>
						</form>				  		  
					</div>
				  
				  
				  
				</div>
			</div>
		</div>		
	</div>	
</div>	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
	
	
<script>
  $(function() { 
    $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
    // сохраним последнюю вкладку
    localStorage.setItem('lastTab', $(this).attr('href'));
  });

  //перейти к последней вкладки, если она существует:
  var lastTab = localStorage.getItem('lastTab');
  if (lastTab) {
    $('a[href="' + lastTab + '"]').tab('show');
  }
  else
  {
    // установить первую вкладку активной если lasttab не существует
    $('a[data-toggle="tab"]:first').tab('show');
  }
});
</script>

  </body>
</html>

<?php } ?>