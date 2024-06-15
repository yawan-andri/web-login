<!DOCTYPE html>
<html>
<head>
    <title>Welcome!</title>
    <?php include 'icon.php'; ?>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <h1>Welcome!</h1>

    <?php
        // Check if a user is logged in (session variable exists)
        if (isset($_SESSION['user_id'])) {
            // Display content or functionality for logged-in users
            echo "<p>You are logged in. Welcome!</p>";
            // Your content for logged-in users goes here
        } else {
            // Redirect to login page if not logged in
            header("Location: login.php");
            exit;  // Exit script after redirect
        }
    ?>

</body>
</html>