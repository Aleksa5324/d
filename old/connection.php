<?php

$HOST  = "127.0.0.1";
$LOGIN = "root";
$PASS  =  "";
$DB    = "cdr";


$link = mysqli_connect($HOST, $LOGIN, $PASS, $DB) or die("Не могу соединиться с MySQL");

mysqli_set_charset($link, "utf8");

?>