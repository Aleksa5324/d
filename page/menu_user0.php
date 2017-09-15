<ul class="nav navbar-nav">
    <li <?php if (($_SERVER['REQUEST_URI'] == '/page/info.php') or ($_SERVER['REQUEST_URI'] == '/d/page/info.php')) echo 'class="active"'?>> <a href="info.php">Информация</a></li>
    <li <?php if (($_SERVER['REQUEST_URI'] == '/page/golos.php') or ($_SERVER['REQUEST_URI'] == '/d/page/golos.php')) echo 'class="active"'?>><a href="golos.php">Голосование</a></li>
	<li <?php if (($_SERVER['REQUEST_URI'] == '/page/testy.php') or ($_SERVER['REQUEST_URI'] == '/d/page/testy.php')) echo 'class="active"'?>><a href="testy.php">Тесты</a></li>
	
</ul>
    
