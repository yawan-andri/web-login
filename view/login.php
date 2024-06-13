<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css">
  <script src="../js/login.js"></script>
</head>
<body>

<?php
// Start the session (if not already started)
session_start();

// Check for failed login session variable
if (isset($_SESSION['failed_login'])) {
  $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";

  // Clear the failed login session variable
  unset($_SESSION['failed_login']);
}

if (isset($_SESSION['user_id'])) {
  // User is already logged in, redirect to index.php
  header("Location: index.php");
  exit;
}
?>

<div class="container">
  <div class="box-login">
    <form action="../conn/check_login.php" method="post"> 
      <center>
        <h3>Login</h3>
      </center>
      <div class="box-form">
        <label>Username</label>
        <input type="text" name="username" id="username" placeholder="Masukkan username ..">
      </div>
      <div class="box-form">
        <label>Password</label>
        <input type="password" name="password" id="password" placeholder="Masukkan password ..">
      </div>
      <input type="checkbox" onclick="showHide()"> Tampilkan Password 
      <input type="submit" value="LOGIN" class="tombol-login" name="login">
    </form>
  </div>
</div>


</body>
</html>