<!DOCTYPE html>
<html>
<head>
	<title>Google Charts Example</title>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Name', 'Sales'],
				<?php
				// Connect to database
				$host = 'localhost';
				$user = 'root';
				$password = 'Maritimjane2020!';
				$dbname = 'businessdb';
				$conn = mysqli_connect($host, $user, $password, $dbname);

				// Check connection
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				// Query to retrieve data
				$sql = "SELECT firstname, sales FROM sales_info LIMIT 10";
				$result = mysqli_query($conn, $sql);

				// Loop through data and add to chart
				while($row = mysqli_fetch_assoc($result)) {
					echo "['".$row['firstname']."', ".$row['sales']."],";
				}

				mysqli_close($conn);
				?>
			]);

			var options = {
				title: 'Sales Data',
				legend: { position: 'none' },
				hAxis: {
					title: 'Name'
				},
				vAxis: {
					title: 'Sales'
				}
			};

			var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
			chart.draw(data, options);
		}
	</script>
</head>
<body>
	<div id="chart_div" style="width: 900px; height: 500px;"></div>
</body>
</html>
