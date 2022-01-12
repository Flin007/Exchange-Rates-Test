<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
	<!-- Datepicker -->
    <link rel="stylesheet" href="plugins/datepicker3/air-datepicker.css">
    <!-- Common css -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- JQ CDN -->
	<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>
<body>
	<div class="wrapper">
		<div id="charts"></div>
		<div class="form_container">
			<form id="updateCharts" action="">
				<div class="input_row">
					<input name="date-range" type="text" placeholder="Выберете диапазон дат" class="datepicker-here"/ required readonly>
					<span class="error">Неверные значения, выберете диапазон из двух дат</span>
				</div>
				<button type="submit">Показать</button>
			</form>
		</div>
	</div>

	<!-- highcharts -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<!-- Date picker -->
	<script src="plugins/datepicker3/air-datepicker.js"></script>
	<!-- common js -->
	<script src="js/script.js"></script>
</body>
</html>