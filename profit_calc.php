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

// SQL query to create the table with columns for id, revenue, expenses, profits, and losses
$sql = "CREATE TABLE profit_calc (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        revenue FLOAT(10,2) NOT NULL,
        expenses FLOAT(10,2) NOT NULL,
        profits FLOAT(10,2) NOT NULL,
        losses FLOAT(10,2) NOT NULL
)";

// Execute the SQL query and check for any errors
if ($conn->query($sql) === TRUE) {
    echo "Table profit_calc created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
