<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';

//удаляем чат за 1 день (последний)
mysqli_query($db, "DELETE FROM `chat` WHERE `time` < SUBTIME(NOW(), 1 0:0:0)");
?>