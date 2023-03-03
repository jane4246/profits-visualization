<?php
$hostname = "localhost";
$username = "root";
$password = "Maritimjane2020!";
$database = "businessdb";

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the database
$sql = "SELECT * FROM student_info";
$result = mysqli_query($conn, $sql);

// Display data in an HTML table
if (mysqli_num_rows($result) > 0) {
  echo "<table>";
  echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Registration Date</th></tr>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["email"] . "</td><td>" . $row["reg_date"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No data found";
}

// Close connection
mysqli_close($conn);
?>
