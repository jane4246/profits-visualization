<?php

// database connection details
$hostname = "localhost";
$username = "root";
$password = "Maritimjane2020!";
$database = "businessdb";

// connect to the database
$conn = mysqli_connect($hostname, $username, $password, $database);

// check if connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// generate 10 random entries
for ($i = 0; $i < 10; $i++) {
  $id = "1984" . $i;
  $product_name = "LG_laptop" . $i;
  $sold = "23" . $i;
  $sales_date = date("Y-m-d H:i:s");

  // insert data into the sales_info table
  $sql = "INSERT INTO sales_info (id,product_name, sold,sales_date) VALUES ('$id', '$product_name', '$sold', '$sales_date')";
  if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully<br>";
  } else {
    echo "Error inserting data: " . mysqli_error($conn) . "<br>";
  }
}

// close the database connection
mysqli_close($conn);

?>
