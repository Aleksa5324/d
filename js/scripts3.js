  function getData() {
	$.ajax({
		url: "data.php",
		dataType: "json",
		async: false
	}).done(function(response) {
		chartArr = [];
		response.forEach(function(choise) {
			switch(choise[0]) {
			case 'openvox-gsm-yes':
				chartArr.push(parseInt(choise[1]));
				break;
			case 'openvox-gsm-no':
				chartArr.push(parseInt(choise[1]));
				break;
			// case 'openvox-gsm-dont-know':
			// 	chartArr.push(parseInt(choise[1]));
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
	// console.log(chartArr);
	
	var yes = chartArr[0];
	var no = chartArr[1];
	var ch100 = yes + no;
	
	var yesPerc = Math.ceil(yes / ch100 * 100);
	var noPerc = Math.floor(no / ch100 * 100);
	
	// console.log(yesPerc + '  ' + noPerc);
	
	$('.progress-yes').css('width', yesPerc + '%');
	//$('.progress-yes span').text(yesPerc + '% (Поддерживаю)');
	$('.progress-yes span').text(yesPerc + '%');
	
	
	$('.progress-no').css('width', noPerc + '%');
	//$('.progress-no span').text(noPerc + '% (Не поддерживаю)');
	$('.progress-no span').text(noPerc + '%');
  }
  
  $(document).ready(function(){
	  drawChart();
  });
 
