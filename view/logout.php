<?php
// Start the session
session_start();

// Destroy the session (log out the user)
session_destroy();

// Redirect to login page after logout
header("Location: login.php");
?>