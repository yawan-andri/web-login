<?php
	// Start the session (if not already started)
	session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> IC </title>
    <link rel="stylesheet" href="../css/navbar.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <nav>
        <div class="navbar">
            <i class='bx bx-menu'></i>
            <div class="logo"><a href="index.php">IC</a></div>
            <div class="nav-links">
                <div class="sidebar-logo">
                    <span class="logo-name">INTERNAL CONTROL</span>
                    <i class='bx bx-x' ></i>
                </div>
                <ul class="links">
                    <li><a href="index.php">HOME</a></li>
                    <li>
                        <a href="#">SOP</a>
                        <i class='bx bxs-chevron-down js-arrow arrow '></i>
                        <ul class="js-sub-menu sub-menu">
                            <li><a href="#">MASTER</a></li>
                            <li><a href="#">SOLUSI MASALAH</a></li>
                        </ul>
                    </li> 
                    <?php
                    // Conditional Logout/Login Link
                    if (isset($_SESSION['user_id'])) {
                        $user_name = $_SESSION['user_name'];  // Fucntiom to display username
                        echo "<li>
                                <a href='#'> Hello, $user_name </a>
                                <i class='bx bxs-chevron-down js-arrow arrow'></i>
                                <ul class='js-sub-menu sub-menu'>
                                    <li><a href='#'>Setting Password</a></li>
                                    <li><a href='logout.php'>Logout</a></li>
                                </ul>
                            </li>";
                    } else {
                        echo "<li><a href='login.php'>Login</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <script src="../js/navbar.js"></script>
</body>
</html>