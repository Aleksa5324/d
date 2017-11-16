<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';

//видеочат
if(isset($_POST['subVideoChat'])) {
	$_POST['text'] = FormChars($_POST['text']);
	mysqli_query($db, "INSERT INTO `videochat` VALUES ('','$_POST[text]', '$_SESSION[USER_LOGIN]', NOW())");
	exit(header('location: video.php'));
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html>
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Видео трансляции</title>

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

	
<!-- Вывод инфосообщения -->
<?php if(isset($info)) { ?>
	<h2 style="color:red; padding-left:15px;"><?php echo $info; ?></h2>
<?php } ?>

	
<div class = "container">
<!--info --> 
<?php MessageShow(); ?>

	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
		
				<p>Здесь скоро будет прямая видеотрансляция...</p>
								
				<!--<div id="fon"></div>-->
					<div id="vstream">
						<script src="hdwplayer.js"></script>
						<div id="player"></div>
						<script>

// FLASH
/* 
hdwplayer({ 
	id       : 'player',
	swf      : 'player.swf',
	width    : '550',
	height   : '305',
	type	 : 'video',
	video    : 'http://www.hdwplayer.com/videos/2012.mp4',
	autoStart: 'true'
}); 
*/							 
								 
								
								hdwplayer({ 
									id        : 'player',
									swf       : 'player.swf',
									width     : '550',
									height    : '305',
									type      : 'rtmp',
									streamer  : 'rtmp://188.40.136.78/myapp',
									video     : 'Mystream',
									videoHTML5 : 'http://188.40.136.78:8080/t2/mystream.m3u8',
									autoStart : 'true'
								});
									
								
						</script>
					</div>
					
					
					<div>
						<span style="padding-right:20px;">Просмотров (1100)</span>
						<img src="../img/yes.png" width="20" height="20"> 
						<span style="padding-right:20px;">Нравится	(1000)</span>
						<img src="../img/no.png" width="20" height="20">
						<span style="padding-right:20px;">Не нравится (100)</span>
					</div>
			</div>
			
			
			<div class="col-md-6">
				<p>А пока посмотрите новый видеоклип:</p>
				<div class="video-responsive">
					<iframe width="555px;" height="312px;" src="http://www.youtube.com/embed/ysSxxIqKNN0" frameborder="0" allowfullscreen></iframe>
				</div>	
				
			</div>	
	
			
		</div>
	</div>
	
	<div class="col-md-6">
		<br>
		<p>Для просмотра видеотрансяции необходимо оплатить подписку.</p>
		<p>Стоимость подписки 100 грн.</p>
					
					
		<div class="mbr-section-btn pt-4">
			<a href="https://www.liqpay.ua/" class="btn btn-primary display-4" target="_blank">ОПЛАТИТЬ</a>
		</div>
		<br>
		<br>
	</div>		
	
	
	
	<div class = "row">
		<div class="col-md-12">	
			<div class = "tabs">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#opt_v_1" data-toggle="tab">Анонс</a></li>
				  <li><a href="#opt_v_2" data-toggle="tab">Вопросы</a></li>
				  <li><a href="#opt_v_3" data-toggle="tab">Голосование</a></li>
				  <li><a href="#opt_v_4" data-toggle="tab">Файлы</a></li>
				  <li><a href="#opt_v_5" data-toggle="tab">Видеоархив</a></li>
				  <li><a href="#opt_v_6" data-toggle="tab">Чат</a></li>
				</ul>

					<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="opt_v_1">
					
						<div class="row">
                        <div class="col-sm-2">
                            <div class="companyinfo">
                                <h2>Анонс</h2>
                                <p>Спешите подписаться на просмотр следующего материала</p>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe1.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Веб разработка</p>
                                    <h2>24/11/2017</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe2.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Банковское дело</p>
                                    <h2>27/12/2017</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe3.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Кулинария</p>
                                    <h2>03/01/2018</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe4.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Торговля с Китаем</p>
                                    <h2>10/01/2018</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="address">
                                <img src="../img/map.png" alt="">
                                <p></p>
                            </div>
                        </div>
                    </div>
					
					
					</div>
					
					<div class="tab-pane" id="opt_v_2">
						<div class="col-md-6">
							<br>
							<p>Вы можете задать "приватный" вопрос в ходе прямой трансляции.</p>
							<p>Стоимость подписки 100 грн.</p>
										
										
							<div class="mbr-section-btn pt-4">
								<a href="https://www.liqpay.ua/" class="btn btn-primary display-4" target="_blank">ОПЛАТИТЬ</a>
							</div>
							<br>
														
							<div class = "row">
								<div class="col-md-12">	
									<form action="" method="post">
										<fieldset>
											<legend style="color: green">Задать вопрос</legend>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<textarea rows="3" cols="70" name="text" placeholder="Ваш вопрос"></textarea>
													</div>
												</div>
											</div>
																	
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<button type="submit" name="" class="btn btn-success">Отправить</button>
													</div>
												</div>
											</div>	
										</fieldset>
									</form>
								</div>	
							</div>	
							
						</div>	
					</div>
					
					<div class="tab-pane" id="opt_v_3">
					
						<div class="col-md-12">
							<br>
							<p>Поучаствуйте в опросе во время прямой трансляции. Это поможет лучше понять аудиторию зрителей.</p>
							
							<div class="row">
							<div class="col-md-6">
								<form class="form-horizontal" action="" method="post">
									
									<br><br>
										
										<p style="font-size: 16px;"><b>Готовы ли Вы постоянно принимать участие в прямых эфирах?</b></p>
										
										<div class='radio'>
											<label>
												<input type='radio' name="opros" value='ans1'>Да, безусловно
											</label>
										</div>
										
										<div class='radio'>
											<label>
												<input type='radio' name="opros" value='ans2'>Не готов ответить
												</label>
										</div>
										
										<div class='radio'>
											<label>
												<input type='radio' name="opros" value='ans3'>Возможно
												</label>
										</div>
										
										<div class='radio'>
											<label>
												<input type='radio' name="opros" value='ans4'>Нет, однозначно
											</label>
										</div>
										

										<br>									
										<div class="form-group">
											<div class="col-md-4 col-md-offset-2">
												<button type="submit" name="subGolosVideo1" class="btn btn-success">Проголосовать</button>
											</div>
										</div>
												
																					
									
								</form>
							</div>	

							<div class="col-md-6">
								<form class="form-horizontal" action="" method="post">
								<br><br>
									<p style="font-size: 16px;"><b>Какой вид информации удобен для восприятия лично Вам?</b></p>
										
										<div class='radio'>
											<label>
												<input type='radio' name="opros2" value='ans5'>ТВ
											</label>
										</div>
										
										<div class='radio'>
											<label>
												<input type='radio' name="opros2" value='ans6'>Интернет
												</label>
										</div>
										
										<div class='radio'>
											<label>
												<input type='radio' name="opros2" value='ans7'>Радио
												</label>
										</div>
										
										<div class='radio'>
											<label>
												<input type='radio' name="opros2" value='ans8'>Личное общение
											</label>
										</div>
										

										<br>									
										<div class="form-group">
											<div class="col-md-4 col-md-offset-2">
												<button type="submit" name="subGolosVideo2" class="btn btn-success">Проголосовать</button>
											</div>
										</div>
								</form>
							</div>
						</div>	
						</div>
					</div>
					
					<div class="tab-pane" id="opt_v_4">
					<br>
						<a href="#">file1.rar</a><br>
						<a href="#">file2.rar</a><br>
						<a href="#">file3.rar</a><br>
						<a href="#">file4.rar</a><br>
					</div>
					
					<div class="tab-pane" id="opt_v_5">
						<div class="col-sm-7">
                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe1.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Веб разработка</p>
                                    <h2>24/11/2017</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe2.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Банковское дело</p>
                                    <h2>27/12/2017</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe3.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Кулинария</p>
                                    <h2>03/01/2018</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe4.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Торговля с Китаем</p>
                                    <h2>10/01/2018</h2>
                                </div>
                            </div>
							
							<div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe1.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Веб разработка</p>
                                    <h2>24/11/2017</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe2.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Банковское дело</p>
                                    <h2>27/12/2017</h2>
                                </div>
                            </div>
							
							<div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe3.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Кулинария</p>
                                    <h2>03/01/2018</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe4.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Торговля с Китаем</p>
                                    <h2>10/01/2018</h2>
                                </div>
                            </div>
							
							<div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe1.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Веб разработка</p>
                                    <h2>24/11/2017</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe2.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Банковское дело</p>
                                    <h2>27/12/2017</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe3.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Кулинария</p>
                                    <h2>03/01/2018</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="../img/iframe4.png" alt="">
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Торговля с Китаем</p>
                                    <h2>10/01/2018</h2>
                                </div>
                            </div>
							
                        </div>
                        
					</div>
					
					<div class="tab-pane" id="opt_v_6">
											
						<div class="Page">
		
							<div class="VideoChatBox">

								<?php	
								$query = mysqli_query($db, 'SELECT * FROM `videochat` ORDER BY `time` DESC LIMIT 50');
								while($row = mysqli_fetch_assoc($query)) {
									echo '<div class="ChatBlock"><span>'.$row['user'].' | '.$row['time'].'</span>'.$row['message'].'</div>';
								}
								?>						
								
							</div>
						
								<form class="form-horizontal" role="form" method ="POST" action ="video.php">
									<br>									
									
									<textarea rows="3" cols="70" class ="VideoChatMessage" name="text" placeholder="Текст сообщения" required></textarea>
									
									<div class="row">
										
										<div class="col-md-4" style="padding-left: 30px;">
											<br>
											<div class="form-group">
												<button class="btn btn-success" type="submit" name ="subVideoChat">Отправить</button>
												<button class="btn btn-danger"  type="reset">Очистить</button>
											</div>
										</div>
									</div>
								</form>
						
						
							
						</div>
						
						
					</div>
					
					
					
				</div>
			</div>
		</div>
	</div>
</div>	<!-- /container -->

	
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
