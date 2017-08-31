<?php
include_once '../connect.php';
include_once '../lib/myFunction.php';
d($_POST,0);
d($_SESSION['country']);


/*извлечение страны из базы
if (isset($_POST['selectCountry'], $_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
	$sql =  mysqli_query ($db,"
			SELECT * 
			FROM `countries` 
			ORDER BY `id` DESC
			") or exit(mysqli_error());

	$_SESSION['country'] = $_POST['selectCountry'];
}
*/

if (isset($_POST['selectCountry'])) {
	$countryId = $_POST['selectCountry'];
}


					
if (isset($_POST['selectTel1'], $_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = mysqli_query ($db, "
	SELECT * FROM `phones` 
	WHERE `id`=".$countryId."
	") or exit(mysqli_error());
	while($row = mysqli_fetch_assoc($sql)){
		$_SESSION['telefon1'] = $row['number_tel']; //сохраняем в сессию номер телефона
		
	}
}	

if (isset($_POST['selectTel2'], $_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = mysqli_query ($db, "
	SELECT * FROM `phones` 
	WHERE `id`=".$countryId."
	") or exit(mysqli_error());
	while($row = mysqli_fetch_assoc($sql)){
		$_SESSION['telefon2'] = $row['number_tel']; //сохраняем в сессию номер телефона
		
	}
}

if (isset($_POST['selectTel3'], $_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = mysqli_query ($db, "
	SELECT * FROM `phones` 
	WHERE `id`=".$countryId."
	") or exit(mysqli_error());
	while($row = mysqli_fetch_assoc($sql)){
		$_SESSION['telefon3'] = $row['number_tel']; //сохраняем в сессию номер телефона
		
	}
}


?>
