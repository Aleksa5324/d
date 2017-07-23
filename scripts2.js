  // Load Charts and the corechart and barchart packages.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart and bar chart when Charts is loaded.
      google.charts.setOnLoadCallback(drawChart);

	  function getData() {
		$.ajax({
			url: "data.php",
			dataType: "json",
			async: false
		}).done(function(response) {
			chartArr = [['Да'], ['Нет']];
			response.forEach(function(choise) {
				switch(choise[0]) {
				case 'openvox-gsm-yes':
					chartArr[0].push(parseInt(choise[1]));
					break;
				case 'openvox-gsm-no':
					chartArr[1].push(parseInt(choise[1]));
					
					break;
				// case 'openvox-gsm-dont-know':
				// 	chartArr[1].push(parseInt(choise[1]));
				// 	break;
				default:
					break;
				}
			});

		}).fail(function(error) {
			throw Error('Failed get data from server: ' + error.responseText);
		});
	  }
	  
      function drawChart() {
		getData();
        
		var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows(chartArr);

        var piechart_options = {title:'Круговая диаграмма: Нравится ли Вам город?',
                       width:600,
                       height:500,
					   backgroundColor: { fill:'transparent' }};
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        piechart.draw(data, piechart_options);

        var barchart_options = {title:'Линейная диаграмма: Нравится ли Вам город?',
                       width:600,
                       height:500,
                       legend: 'none',
					   backgroundColor: 'transparent'};
        var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
        barchart.draw(data, barchart_options);
      }
