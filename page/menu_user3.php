<ul class="nav navbar-nav">
	<li <?php if (($_SERVER['REQUEST_URI'] == '/page/information.php') or ($_SERVER['REQUEST_URI'] == '/d/page/information.php')) echo 'class="active"'?>> <a href="information.php">Информация</a></li>
    <li <?php if (($_SERVER['REQUEST_URI'] == '/page/main.php') or ($_SERVER['REQUEST_URI'] == '/d/page/main.php')) echo 'class="active"'?>> <a href="main.php">Главная</a></li>
    <li <?php if (($_SERVER['REQUEST_URI'] == '/page/history.php') or ($_SERVER['REQUEST_URI'] == '/d/page/history.php')) echo 'class="active"'?>><a href="history.php">История</a></li>
	<li <?php if (($_SERVER['REQUEST_URI'] == '/page/news.php') or ($_SERVER['REQUEST_URI'] == '/d/page/news.php')) echo 'class="active"'?>><a href="news.php">Новости</a></li>
    <li class="dropdown">
        <a href="news.php" class="dropdown-toggle" data-toggle="dropdown">Настройки<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="admin_polls.php">Интернет голосование</a></li>
            <li class="divider"></li>
			<li><a href="options.php">Опции графиков</a></li>
			<li><a href="options_oprosy.php">Опции опросов</a></li>
			<li><a href="options_testy.php">Опции тестов</a></li>
        </ul>
    </li>
</ul>