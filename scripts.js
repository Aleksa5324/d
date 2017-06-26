document.onload = function() {
  //Создаем диаграмму GoogleChart как написано в документации Google

  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);

  var chart = new google.visualization.PieChart($('#piechart_3d'));
  var UPDATE_INTERVAL = 1000;

  function getData() {
    var jsonData = $.ajax({
      url: "data.php",
      dataType: "json",
      async: false
    });

    return jsonData.responseText;
  }

  function updateView() {
    drawChart();
  }

  function drawChart() {
    var data = new google.visualization.DataTable(getData()); //  а в примере Google используется массив
    var options = {
      title: 'Нужны ли выборы в Украине?',
      //legend: 'none',
      //pieSliceText: 'label',
      is3D: true
    };
    chart.draw(data, options);
  }

  setInterval(updateView, UPDATE_INTERVAL);
};