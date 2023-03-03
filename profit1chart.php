<?php
// Define your database connection parameters
$servername = "localhost";
$username = "root";
$password = "Maritimjane2020!";
$dbname = "businessdb";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check for any errors in the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to retrieve the data from the table
$sql = "SELECT date, profits, losses FROM profit_calc ORDER BY date ASC";
$result = mysqli_query($conn, $sql);

// Create an empty array to store the data for plotting the chart
$data = array();

// Add the header row to the data array
$data[] = ['Date', 'Profits', 'Losses'];

// Loop through the result set and add each row to the data array
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [$row['date'], (float)$row['profits'], (float)$row['losses']];
}

// Convert the data array to a JSON string
$data_json = json_encode($data);

// Close the database connection
mysqli_close($conn);
?>

<!-- HTML code for displaying the chart -->
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(<?php echo $data_json; ?>);

            var options = {
                title: 'Profits and Losses',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
</body>
</html>
