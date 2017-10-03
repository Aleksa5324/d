window.onload = function() {
		
	google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(init);
		
	var chart;
	var UPDATE_INTERVAL = 10000; //10000 милисекунд=10 сек
	var jsonData;
	
	function init() {
		chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
		updateView();
		setInterval(updateView, UPDATE_INTERVAL);
	}

	function getData() {
		jsonData = $.ajax({
		url: "data_o.php",
		dataType: "json",
		async: false
		}).responseText;
	}

	function updateView() {
		drawChart();
	}

	function drawChart() {
		getData();
		var data = new google.visualization.DataTable(jsonData);
		var options = {
						//'title':'How Much Pizza I Ate Last Night',
						'width':1900,
						'height':820,
						//'is3D': true,
						
						'legend': {position: 'none', textStyle: {color: 'black', fontSize: 36}},
						'bar': {groupWidth: "75%"},
						'titleTextStyle': {fontSize:36,},
						'chartArea': {left:20,top:200,width:'95%',height:'80%'}
					   };
					   
		chart.draw(data, options);
	}
};