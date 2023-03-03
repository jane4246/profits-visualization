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

// SQL query to add a new column to the table
$sql = "ALTER TABLE profit_calc ADD COLUMN date DATE";

// Execute the SQL query
if (mysqli_query($conn, $sql)) {
    echo "New column added successfully";
} else {
    echo "Error adding column: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
