<?php
	// Start the session (if not already started)
	session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!--<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>-->
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>                        
                    </button>
                <a class="navbar-brand" href="index.php">Internal Control</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Master<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">SOP</a></li>
                            <li><a href="#">SKB</a></li>
                            <li><a href="#">DAS</a></li>
                            <li><a href="#">Panduan</a></li>
                        </ul>
                        </li>
                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Transaksi<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="audit.php">Audit</a></li>
                            <li><a href="#">Audit Digital</a></li>
                            <li><a href="#">Control BAPT</a></li>
                            <li><a href="#">Evaluasi Manager</a></li>
                        </ul>
                        </li>
                        <li><a href="#">Laporan</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                        <?php
                            if (isset($_SESSION['user_id'])) {
                                $user_name = $_SESSION['user_name'];  // Fucntiom to display username
                                echo    "<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Halo, $user_name<span class='caret'></span></a>
                                        <ul class='dropdown-menu'>
                                            <li><a href='#'>Setting Password</a></li>
                                            <li><a href='logout.php'>Log Out</a></li>
                                        </ul>";
                            } else {
                                echo "<li><a href='login.php'>Login</a></li>";
                            }           
                        ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>