	// Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
			var jsonData = $.ajax({
			  url: "data_o.php",
			  dataType: "json",
			  async: false
			  }).responseText;

        // Create the data table.
        var data = new google.visualization.DataTable(jsonData);
        

        // Set chart options
        var options = {
						//'title':'How Much Pizza I Ate Last Night',
						'width':1900,
						'height':820,
						//'is3D': true,
						
						'legend': {position: 'right', textStyle: {color: 'black', fontSize: 36}},
						'titleTextStyle': {fontSize:36,},
						'chartArea': {left:20,top:200,width:'95%',height:'80%'}
					   };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
