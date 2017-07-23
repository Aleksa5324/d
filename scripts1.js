 google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

	  function getData() {
		$.ajax({
			url: "data.php",
			dataType: "json",
			async: false
		}).done(function(response) {
			chartArr = [['Ответы', 'Да', 'Нет']];
			chartArr.push([' ']);
			response.forEach(function(choise) {
				switch(choise[0]) {
				case 'openvox-gsm-yes':
					chartArr[1].push(parseInt(choise[1]));
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
        //var data = google.visualization.arrayToDataTable([
        //  ['Ответы', 'Да', 'Нет', 'Не знаю'],
        //  ['2017', 1000, 400, 200]
        //]);
		getData();
		// console.log(chartArr);
		var data = google.visualization.arrayToDataTable(chartArr);
		
        var options = {
          chart: {
            title: 'Нужен ли городу СК "ДНЕПР-1"',
            subtitle: 'голосование жителей Днепра'
		  },
		  backgroundColor: { fill:'transparent' }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
