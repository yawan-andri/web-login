<?php
// Start the session (if not already started)
session_start();
?>

<div class="navbar">
  <a href="index.php">Home</a>
  <?php
  // Conditional Logout/Login Link
  if (isset($_SESSION['user_id'])) {
    echo "<a href='logout.php'>Logout</a>";

    $user_name = $_SESSION['user_name'];  // Fucntiom to display username
    echo "<a href='#'> $user_name </a>";  // Display username
  } else {
    echo "<a href='login.php'>Login</a>";
  }
  ?>
</div>

