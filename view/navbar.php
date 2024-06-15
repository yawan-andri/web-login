<!DOCTYPE html>
<html>
<head>
	<title>IC</title>
	<link rel="stylesheet" href="../css/navbar.css">
	<link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
</head>
<body>
	<?php
	// Start the session (if not already started)
	session_start();
	?>


	<header class="header">
		<div class="menu-navbar">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li class="dropdown"><a href="#">Menu 1</a>
					<ul class="isi-dropdown">
						<li><a href="#">Sub Menu 1</a></li>
						<li><a href="#">Sub Menu 2</a></li>
						<li><a href="#">Sub Menu 3</a></li>
						<li><a href="#">Sub Menu 4</a></li>
					</ul>
				</li>
				<?php
				// Conditional Logout/Login Link
				if (isset($_SESSION['user_id'])) {
					echo "<li><a href='logout.php'>Logout</a></li>";

					$user_name = $_SESSION['user_name'];  // Fucntiom to display username
					echo "<li><a href='#'> $user_name </a></li>";  // Display username
				} else {
					echo "<li><a href='login.php'>Login</a></li>";
				}
				?>
			</ul>
		</div>
	</header>
<br/>
</body>
</html>