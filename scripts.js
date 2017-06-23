google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {
		var jsonData = $.ajax({
          url: "data.php",
          dataType: "json",
          async: false
        }).responseText;
		  
		  
		  
		  
       //st var data = google.visualization.arrayToDataTable(jsonData);
		var data = new google.visualization.DataTable(jsonData);
			

		

        var options = {
          title: 'Нужны ли выборы в Украине?',
		  //legend: 'none',
		  //pieSliceText: 'label',
		  is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
