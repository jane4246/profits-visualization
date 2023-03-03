<?php

// DB details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'Maritimjane2020!';
$dbName = 'businessdb';

// Create connection and select database
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the database
$result = mysqli_query($conn, "SELECT product_name, sold FROM sales_info");

// Define the chart data
$chart_data = array(['Product Name', 'Sold']);

// Loop through the result set and add to chart data
while ($row = mysqli_fetch_assoc($result)) {
    $chart_data[] = array($row['product_name'], (int)$row['sold']);
}

// Convert data to JSON format
$json_data = json_encode($chart_data);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Google Charts with PHP and MySQL</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable(<?php echo $json_data; ?>);
            var options = {
                title: 'Product Sales',
                legend: { position: 'bottom' }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="columnchart" style="width: 900px; height: 500px;"></div>
</body>
</html>
