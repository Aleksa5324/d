<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';
//header('Content-Type: text/html; charset=utf-8');

//настройка панели гостей
if(isset($_POST['selectPanelGuests'], $_POST['subOpt4'])){
	$selectPanelGuests = $_POST['selectPanelGuests'];
	
	if($selectPanelGuests == 'guest0') {
		$_SESSION['guest'] = 0;
	} elseif($selectPanelGuests == 'guest1') {
		$_SESSION['guest'] = 1;
	} elseif($selectPanelGuests == 'guest2') {
		$_SESSION['guest'] = 2; 
	} else $_SESSION['guest'] = '';
}


?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Голосование</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../style.css" />
 
 <!-- Latest compiled and minified JavaScript -->
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="../js/scripts3.js"></script>
  <script type="text/javascript">
	function showTime()
	{
	  var dat = new Date();
	  var H = '' + dat.getHours();
	  H = H.length<2 ? '0' + H:H;
	  var M = '' + dat.getMinutes();
	  M = M.length<2 ? '0' + M:M;
	  var S = '' + dat.getSeconds();
	  S =S.length<2 ? '0' + S:S;
	  var clock = H + ':' + M + ':' + S;
	  document
		.getElementById('time_div')
		  .innerHTML=clock;
	  setTimeout(showTime,1000);  // перерисовать 1 раз в сек.
	}
</script>
  </head>
  <body>
		
<?php
//вывод панел логотипа
if(isset($_POST['selectPanelLogo'], $_POST['subOpt4'])){
	$selectPanelLogo = $_POST['selectPanelLogo'];
	
	if($selectPanelLogo == 'logo1') {
		echo '
			<div class="logo">
				<img src="../img/logo_fc_dnepr.png" alt="">
			</div> 
		
		';
	} elseif($selectPanelLogo == 'logo2') {
		echo '';
	}
}
?>	
	
		
	<div class ="wrapper">
		
		<div class ="container-fluid">	
	
	
<?php
//вывод правой панели
if(isset($_POST['selectPanelRight'], $_POST['subOpt4'])){
	$selectPanelRight = $_POST['selectPanelRight'];
	
	if($selectPanelRight == 'right1') {
		echo '
			<div class="rightPanel">
			
				<div id = "facebook"><b>Голосование FACEBOOK</b>
					<div class="progress" style ="height: 54px">
						<div class="progress-bar progress-bar-success" style="width: 25%; font-size: 26px; line-height: 54px">
							<span>25%</span>
						</div>
						
						<div class="progress-bar progress-bar-danger" style="width: 75%; font-size: 26px; line-height: 54px">
							<span>75%</span>
						</div>
					</div>
				</div> 
				
				<div id = "livestrim"><b>Голосование LIVESTRIM</b>
					<div class="progress" style ="height: 54px">
						<div class="progress-bar progress-bar-success" style="width: 80%; font-size: 26px; line-height: 54px">
							<span>80%</span>
						</div>
						
						<div class="progress-bar progress-bar-danger" style="width: 20%; font-size: 26px; line-height: 54px">
							<span>20%</span>
						</div>
					</div>
				</div> 
				
				<div id = "youtube"><b>Голосование YOUTUBE</b>
					<div class="progress" style ="height: 54px">
						<div class="progress-bar progress-bar-success" style="width: 75%; font-size: 26px; line-height: 54px">
							<span>75%</span>
						</div>
						
						<div class="progress-bar progress-bar-danger" style="width: 25%; font-size: 26px; line-height: 54px">
							<span>25%</span>
						</div>
					</div>
				</div> 
					
				<div id = "instagram"><b>Голосование INSTAGRAM</b>
					<div class="progress" style ="height: 54px">
						<div class="progress-bar progress-bar-success" style="width: 30%; font-size: 26px; line-height: 54px">
							<span>30%</span>
						</div>
						
						<div class="progress-bar progress-bar-danger" style="width: 70%; font-size: 26px; line-height: 54px">
							<span>70%</span>
						</div>
					</div>
				</div> 
				
				<div id = "periscope"><b>Голосование PERISCOPE</b>
					<div class="progress" style ="height: 54px">
						<div class="progress-bar progress-bar-success" style="width: 20%; font-size: 26px; line-height: 54px">
							<span>20%</span>
						</div>
						
						<div class="progress-bar progress-bar-danger" style="width: 80%; font-size: 26px; line-height: 54px">
							<span>80%</span>
						</div>
					</div>
				</div> 
			</div>
		
		';
	} elseif($selectPanelRight == 'right2') {
		echo '';
	}
}
?>			
			
		
			<div class="topPanel">


			
<?php
//выводим панель гостей
if(isset($_SESSION['guest']) && $_SESSION['guest'] == 0 ) {

echo '';

} elseif(isset($_SESSION['guest']) && $_SESSION['guest'] == 1 ) {

echo '
			<div class="row minPadd" style = "background-color:yellow;">
				<div class="col-md-12">
					<div style ="text-align: center; font-size: 30px;">Поддерживаю (+3805005050): Иванов И.И.</div>
				</div>
			</div>
';	
} elseif(isset($_SESSION['guest']) && $_SESSION['guest'] == 2 ) {

echo '
			<div class="row minPadd" style = "background-color:yellow; display: block;">
				<div class="col-md-6">
					<div style ="text-align: center; font-size: 30px; border-right:1px dotted #7f7f6a">Поддерживаю (+3805005050): Иванов И.И.</div>
				</div>
				<div class="col-md-6">
					<div style ="text-align: center; font-size: 30px;">Поддерживаю (+3805005051): Петров П.П.</div>
				</div>
			</div>
';	
} 


//вывод панели голосования
if(isset($_POST['selectPanelVote'], $_POST['subOpt4'])){
	$selectPanelVote = $_POST['selectPanelVote'];
	
	if($selectPanelVote == 'vote1') {
		echo '
			<div class="row minPadd">
				<div class="progress" style ="height: 54px">
					<div class="progress-bar progress-bar-success progress-yes" style="width: 35%; font-size: 36px; line-height: 54px">
						<span>35%</span>
					</div>
					
				<div class="progress-bar progress-bar-danger progress-no" style="width: 65%; font-size: 36px; line-height: 54px">
						<span>65%</span>
					</div>
				</div>
			</div>
		
		';
	} elseif($selectPanelVote == 'vote2') {
		echo '';
	}
}
?>			

						
				<div class="row minPadd">
					<div class="str">
						<div class="col-md-2 time_div">
						<div id="time_div" style="font-size:40px; font-weight:200; width:85px; margin-left: 10px;"></div><script type="text/javascript"> showTime();</script>
							<!--<img src="../img/zastavka.png" width="214" height="54" alt=""> -->
						</div>	
						<div class="col-md-10">
						
						<?php
						if(isset($_SESSION['optionsRadios']) && $_SESSION['optionsRadios'] == 'option3') {
							
							//извлечение новостей из базы
							$news = mysqli_query($db, "
								SELECT *
								FROM `news`
								ORDER BY `id` DESC
								") or exit(mysqli_error());
							
							$beg_stroka = "";
							while($row = mysqli_fetch_assoc($news))
							$beg_stroka .= $row['title']. '***';	
							//вывод бегущей строки
							echo '<marquee behavior="scroll" direction="left"><span style="color:white; font-size: 36px;">' .$beg_stroka.'</marquee>';
													
							
						} elseif(isset($_SESSION['optionsRadios'], $_SESSION['urlRss']) && $_SESSION['optionsRadios'] == 'option2') {
							
							$url = $_SESSION['urlRss']; //адрес RSS ленты, для примера я взял новостную ленту укрправды
	 
							$rss = simplexml_load_file($url); //Функция интерпретирует XML-файл в объект

							$news = "";
							//цикл для считывания всей RSS ленты
							foreach ($rss->channel->item as $item) {
							 $news .= $item->title. '***';
							}
							//вывод бегущей строки
							echo '<marquee behavior="scroll" direction="left"><span style="color:white; font-size: 36px;">' .$news. '</marquee>';
							
						} elseif(isset($_SESSION['optionsRadios']) && $_SESSION['optionsRadios'] == 'option1')  {
						
							echo '<marquee behavior="scroll" direction="left"><span style="color:white; font-size: 36px;">';
							
								
									header('Content-Type: text/html; charset=utf-8');
									$f = fopen("news.txt", "r");
									
									while(!feof($f)) { 
										echo fgets($f);
									}
									fclose($f);
								
								echo '</span></marquee>';
							
						} elseif(empty($_SESSION['optionsRadios']))  {
						
							echo '<marquee behavior="scroll" direction="left"><span style="color:white; font-size: 36px;">';
							
								
									
									$f = fopen("news.txt", "r");
									
									while(!feof($f)) { 
										echo fgets($f);
									}
									fclose($f);
								
								echo '</span></marquee>';
							
						} elseif(empty($_SESSION['urlRss']))  {
							
							$url = 'http://www.pravda.com.ua/rss/view_news/'; //адрес RSS ленты, для примера я взял новостную ленту укрправды
	 
							$rss = simplexml_load_file($url); //Функция интерпретирует XML-файл в объект

							$news = "";
							//цикл для считывания всей RSS ленты
							foreach ($rss->channel->item as $item) {
							 $news .= $item->title. '***';
							}
							//вывод бегущей строки
							echo '<marquee behavior="scroll" direction="left"><span style="color:white; font-size: 36px;">' .$news. '</marquee>';
						
						}
						?>
						
						</div>	
					</div>
				</div>
			</div>	
		</div>
	</div>	
	
	
  </body>
</html>



