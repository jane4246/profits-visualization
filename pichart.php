<?php
//connect to the database
$conn = mysqli_connect("localhost", "root", "Maritimjane2020!", "businessdb");

//query the database to get data for the chart
$sql = "SELECT product_name, SUM(sold) as total_sold FROM sales_info GROUP BY product_name";

$result = mysqli_query($conn, $sql);

//create an array to hold the data for the chart
$data = array();
$data[] = ['Product', 'Total Sold'];

//loop through the result set and add each row to the data array
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [$row['product_name'], (int)$row['total_sold']];
}

//close the database connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Pie Chart</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        //load the Visualization API and the corechart package
        google.charts.load('current', { 'packages': ['corechart'] });

        //set a callback to run when the Visualization API is loaded
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            //create a new DataTable object to hold the data for the chart
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Product');
            data.addColumn('number', 'Total Sold');
            data.addRows(<?php echo json_encode($data); ?>);

            //set the chart options
            var options = {
                'title': 'Total Sold by Product',
                'width': 500,
                'height': 400
            };

            //instantiate and draw the chart, passing in the options and data
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <!--create a div to hold the chart-->
    <div id="chart_div"></div>
</body>

</html>
