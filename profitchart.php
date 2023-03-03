<?php
// Define your database connection parameters
$servername = "localhost";
$username = "root";
$password = "Maritimjane2020!";
$dbname = "businessdb";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for any errors in the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select profits and losses data from the table
$sql = "SELECT profits, losses FROM profit_calc";

// Execute the SQL query and fetch the results
$result = $conn->query($sql);

// Initialize arrays to store data for the chart
$profits = array();
$losses = array();

// Loop through the results and add the data to the arrays
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($profits, $row["profits"]);
        array_push($losses, $row["losses"]);
    }
}

// Close the database connection
$conn->close();

// Create the data and options arrays for the chart
$data = array(
    'labels' => array('Row 1', 'Row 2', 'Row 3'), // Replace with actual row labels
    'datasets' => array(
        array(
            'label' => 'Profits',
            'data' => $profits,
            'backgroundColor' => 'green',
        ),
        array(
            'label' => 'Losses',
            'data' => $losses,
            'backgroundColor' => 'red',
        ),
    ),
);

$options = array(
    'scales' => array(
        'yAxes' => array(
            array(
                'ticks' => array(
                    'beginAtZero' => true,
                ),
            ),
        ),
    ),
);

// Create the chart using Chart.js library
echo '<canvas id="profit-loss-chart"></canvas>';

echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>';

echo '<script>';
echo 'var ctx = document.getElementById("profit-loss-chart");';
echo 'var chart = new Chart(ctx, {';
echo '    type: "bar",';
echo '    data: ' . json_encode($data) . ',';
echo '    options: ' . json_encode($options) . ',';
echo '});';
echo '</script>';
?>
