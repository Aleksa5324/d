//Создаем диаграмму GoogleChart как написано в документации Google

google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {
		var jsonData = $.ajax({
          url: "data.php",
          dataType: "json",
          async: false
        }).responseText;
		  
		  	  
		  
       	var data = new google.visualization.DataTable(jsonData); //  а в примере Google используется массив
			

        var options = {
          title: 'Нужны ли выборы в Украине?',
		  //legend: 'none',
		  //pieSliceText: 'label',
		  is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
