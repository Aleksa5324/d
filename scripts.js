window.onload = function() {
	// Создаем диаграмму GoogleChart как написано в документации Google
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(init);

	var chart;
	var UPDATE_INTERVAL = 1000;
	var chartArr;

	function init() {
		chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
		updateView();
		setInterval(updateView, UPDATE_INTERVAL);
	}

	function getData() {
		var jsonData = $.ajax({
			url: "data.php",
			dataType: "json",
			async: false
		}).done(function(response) {
			var html = '<tr><th colspan="2">Количество звонков:</th></tr>';
			chartArr = [['Ответ', 'Кол-во голосов']];

			response.forEach(function(choise) {
				switch(choise[0]) {
				case 'openvox-gsm-yes':
					chartArr.push(['Да  (тел.: +38-056-3704095)', parseInt(choise[1])]);
					html += '<tr><td>Да</td><td>' + choise[1] + '</td></tr>';
					break;
				case 'openvox-gsm-no':
					chartArr.push(['Нет (тел.:+38-056-3704096)', parseInt(choise[1])]);
					html += '<tr><td>Нет</td><td>' + choise[1] + '</td></tr>';
					break;
				// case 'openvox-gsm-dont-know':
				// 	chartArr.push(['Не знаю', parseInt(choise[1])]);
				// 	html += '<tr><td>Не знаю</td><td>' + choise[1] + '</td></tr>';
				// 	break;
				default:
					break;
				}
			});
			$('#result').html(html);

		}).fail(function(error) {
			throw Error('Failed get data from server: ' + error.responseText);
		});
	}

	function updateView() {
		drawChart();
	}

	function drawChart() {
		getData();
		var data = new google.visualization.arrayToDataTable(chartArr);
		var options = {
			width: 1000,
			height: 600,
			title: 'Нужны ли выборы в Украине?',
			// legend: 'none',
			// pieSliceText: 'label',
			is3D: true
		};
		chart.draw(data, options);
	}
};