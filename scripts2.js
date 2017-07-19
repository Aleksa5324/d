  // Load Charts and the corechart and barchart packages.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart and bar chart when Charts is loaded.
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Да', 3],
          ['Нет', 1],
          ['Не знаю', 1]
        ]);

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
