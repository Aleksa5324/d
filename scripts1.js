 google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Ответы', 'Да', 'Нет', 'Не знаю'],
          ['2017', 1000, 400, 200]
        ]);

        var options = {
          chart: {
            title: 'Нужен ли городу СК "ДНЕПР-1"',
            subtitle: 'голосование жителей Днепра'
			}
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
