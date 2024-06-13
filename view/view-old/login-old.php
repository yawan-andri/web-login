<?php
// Include the connection file
include '../conn/conn.php';

// Escape user input for security (prevent SQL injection)
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Build a secure query
$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
  echo "Error executing query: " . mysqli_error($conn);
  exit;
}

// Check if any rows were returned (user found)
$count = mysqli_num_rows($result);

echo $count;

// Close the connection (optional, recommended in production)
mysqli_close($conn);
?>