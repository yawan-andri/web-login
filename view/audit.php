<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            #tengah {
                text-align: center;
            }
        </style>
        <?php include 'icon.php'; ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>

        <h1 id='tengah'>DATA AUDIT</h1>
            <div class='container' style='margin-top: 50px; text-align: center;'>     
                <table class='table table-striped table-hover table-bordered sortable'>
                    <thead>
                        <tr>
                            <th id='tengah'> </th>
                            <th id='tengah'>Notrans</th>
                            <th id='tengah'>NoSOP</th>
                            <th id='tengah'>UnitUsaha</th>
                            <th id='tengah'>Auditor</th>
                            <th id='tengah'>TglAudit</th>
                            <th id='tengah'>NoBAA</th>
                            <th id='tengah'>Option</th>
                        </tr>
                    </thead>

        <?php
            include_once '../conn/conn.php';

        // Check if a user is logged in (session variable exists)
        if (isset($_SESSION['user_id'])) {
            // Check for connection error
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {

                // Define the SQL query to select specific columns from "sop_control"
                $sql = "SELECT ROW_NUMBER() OVER (ORDER BY notrans ASC) AS nomor, notrans, nosop, unitusaha, auditor, DATE_FORMAT(tglaudit,'%Y-%m-%d') as tglaudit, nobaa FROM sop_control";

                // Perform the query
                $result = mysqli_query($conn, $sql);

                // Check if the query was successful
                if (mysqli_num_rows($result) > 0) {

                    // Loop through each row in the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                                    <tbody>
                                        <tr>
                                            <td>" . $row['nomor'] . "</td>
                                            <td>" . $row['notrans'] . "</td>
                                            <td>" . $row['nosop'] . "</td>
                                            <td>" . $row['unitusaha'] . "</td>
                                            <td>" . $row['auditor'] . "</td>
                                            <td>" . $row['tglaudit'] . "</td>
                                            <td>" . $row['nobaa'] . "</td>
                                            <td>
                                                <a href='#editEmployeeModal' class='edit' data-toggle='modal' style='color: #FFC107'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                                                <a href='#deleteEmployeeModal' class='delete' data-toggle='modal' style='color: #F44336;'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
                                            </td>       
                                        </tr>
                                    </tbody>
                            ";
                    }
                }
                // Close the connection
                mysqli_close($conn);
            }
        } else {
            // Redirect to login page if not logged in
            header("Location: login.php");
            exit; // Exit script after redirect
        }
        ?>
            </table>
        </div>
        <script src="../js/delete.js"></script>
    </body>
</html>