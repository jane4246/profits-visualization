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

// Sample revenue and expenses values
$revenue = 50000.00;
$expenses = 35000.00;

// Calculate profits and losses
if ($revenue > $expenses) {
    $profits = $revenue - $expenses;
    $losses = 0.00;
} else {
    $profits = 0.00;
    $losses = $expenses - $revenue;
}

// SQL query to insert data into the table
$sql = "INSERT INTO profit_calc (revenue, expenses, profits, losses)
        VALUES ($revenue, $expenses, $profits, $losses)";

// Execute the SQL query and check for any errors
if ($conn->query($sql) === TRUE) {
    echo "Data inserted into profit_calc table successfully.";
} else {
    echo "Error inserting data: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
