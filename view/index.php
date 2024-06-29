<!DOCTYPE html>
<html>
<head>
    <title>Internal Control</title>
    <link rel='stylesheet' href = '../css/style.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include 'icon.php'; ?>
</head>
<body>

    <?php include 'navbar.php'; ?>

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
                    echo "<h1>DATA AUDIT</h1>";
                    echo "<table>";
                    echo "<tr>
                            <th> </th>
                            <th>NoTrans</th>
                            <th>NoSOP</th>
                            <th>UnitUsaha</th>
                            <th>Auditor</th>
                            <th>TglAudit</th>
                            <th>NoBAA</th>
                            <th>Opsi</th>
                        </tr>";
                    // Loop through each row in the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr class='isi'>";
                        echo "<td>" . $row['nomor'] . "</td>";
                        echo "<td>" . $row['notrans'] . "</td>";
                        echo "<td>" . $row['nosop'] . "</td>";
                        echo "<td>" . $row['unitusaha'] . "</td>";
                        echo "<td>" . $row['auditor'] . "</td>";
                        echo "<td>" . $row['tglaudit'] . "</td>";
                        echo "<td>" . $row['nobaa'] . "</td>";
                        echo "<td>";
                            // Build option links (replace with actual links or logic)
                            echo "<a href='../func/edit.php?notrans=" . $row['notrans'] . "'><i class='fas fa-edit'></i></a> | ";
                            echo "<a href='../func/delete_audit.php?notrans=" . $row['notrans'] . "' onclick='return confirmDelete()'><i class='fas fa-trash'></i></a> | ";                                                 
                            echo "<a href='../pdf/pdf_audit.php?notrans=" . $row['notrans'] . "'><i class='fas fa-print'></i></a>";                            
                            
                            echo "<form action='../func/delete_audit.php' method='post'>";
                            echo    "<input type='hidden' name='notrans' value='" . $row['notrans'] . "'>";
                            echo    "<input type='hidden' name='jenis' value='audit'>";
                            echo    "<button type='submit' onclick='return confirmDelete()'>";
                            echo        "<i class='fas fa-trash'></i>";
                            echo    "</button>";
                            echo "</form>";
                        
                        
                            echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<tr>
                            <th>NoTrans</th>
                            <th>NoSOP</th>
                            <th>UnitUsaha</th>
                            <th>Auditor</th>
                            <th>TglAudit</th>
                            <th>NoBAA</th>
                        </tr>";
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

    <script src="../js/delete.js"></script>
</body>
</html>