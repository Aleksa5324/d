<?php
include_once '../connect.php';
?>

<!DOCTYPE html>

<html>
  <head>
  <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../style.css" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script src="../js/scripts2.js"></script>
  </head>
  <body>
	<div class="titul">
			<?php 
			if(isset($_SESSION['question'])) {
				echo $_SESSION['question'];
			} else echo "Выберите тему голосования... <a href='../index.php'>Перейти</a>";
			?>
		</div>
    <!--Table and divs that hold the pie charts-->
    <table class="columns">
      <tr>
        <td><div id="piechart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="barchart_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>

  </body>
</html>



