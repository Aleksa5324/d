<?php
  // подключаемся к базе 
  $db = mysqli_connect("127.0.0.1", "root", "", "cdr") or die("Ошибка " . mysqli_error($db));
  mysqli_set_charset($db, "utf8");

function getDataString(){
  global $db;
  $query = "SELECT `dcontext`,COUNT(`dst`) AS dst
    FROM `cdr` WHERE `dst`='gsm0'
    GROUP BY `dcontext`
    UNION
    SELECT `dcontext`,COUNT(`dst`) AS dst
    FROM `cdr` WHERE `dst`='gsm2'
    GROUP BY `dcontext`;";

  $res = mysqli_query($db, $query);
  $data = mysqli_fetch_all($res);

  return json_encode($data);
}

echo getDataString();

// закрываем подключение
//mysqli_close($db);
?>