widnow.onload = function() {
  // Создаем диаграмму GoogleChart как написано в документации Google
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);

  var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
  var UPDATE_INTERVAL = 1000;

  function getData() {
    var jsonData = $.ajax({
      url: "data.php",
      dataType: "json",
      async: false
    }).done(function(response) {
      var array = JSON.parse(response.responseText);
      array.forEach(function(choise) {
        $('#result').append(
          '<tr>' +
            '<td>' + choise[0] + '</td>' +
            '<td>' + choise[1] + '</td>' +
          '</tr>'
        )
      });
    }).fail(function(error) {
      throw Error('Failed get data from server: ' + error.responseText);
    });

    // [["openvox-gsm-yes","5"],["openvox-gsm-no","7"]]

    return jsonData.responseText;
  }

  function updateView() {
    drawChart();
  }

  function drawChart() {
    var data = new google.visualization.DataTable(getData()); // а в примере Google используется массив
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