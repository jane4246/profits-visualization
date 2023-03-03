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

// SQL queries to insert data into the table for different dates
$sql = "INSERT INTO profit_calc (revenue, expenses, date) VALUES (10000.00, 5000.00, '2022-03-01')";
if (mysqli_query($conn, $sql)) {
    $id = mysqli_insert_id($conn);
    $profits = 10000.00 - 5000.00;
    $losses = 0.00;
    if ($profits < 0) {
        $profits = 0.00;
        $losses = abs($profits);
    }
    $sql = "UPDATE profit_calc SET profits='$profits', losses='$losses' WHERE id='$id'";
    mysqli_query($conn, $sql);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "INSERT INTO profit_calc (revenue, expenses, date) VALUES (12000.00, 8000.00, '2022-03-02')";
if (mysqli_query($conn, $sql)) {
    $id = mysqli_insert_id($conn);
    $profits = 12000.00 - 8000.00;
    $losses = 0.00;
    if ($profits < 0) {
        $profits = 0.00;
        $losses = abs($profits);
    }
    $sql = "UPDATE profit_calc SET profits='$profits', losses='$losses' WHERE id='$id'";
    mysqli_query($conn, $sql);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "INSERT INTO profit_calc (revenue, expenses, date) VALUES (8000.00, 12000.00, '2022-03-03')";
if (mysqli_query($conn, $sql)) {
    $id = mysqli_insert_id($conn);
    $profits = 8000.00 - 12000.00;
    $losses = 0.00;
    if ($profits < 0) {
        $profits = 0.00;
        $losses = abs($profits);
    }
    $sql = "UPDATE profit_calc SET profits='$profits', losses='$losses' WHERE id='$id'";
    mysqli_query($conn, $sql);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
