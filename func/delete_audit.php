<?php
include_once '../conn/conn.php'; // Include your database connection file

// Check if a user is logged in (session variable exists)
//if (isset($_SESSION['user_id'])) {
    // Check if the request method is POST (form submission)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the required ID is provided
        if (isset($_POST['jenis']) && $_POST['jenis'] === 'delete') {
            if (isset($_POST['notrans'])) {
                $notrans = mysqli_real_escape_string($conn, $_POST['notrans']); // Sanitize input

                // Define the SQL query to delete the record
                $sql = "DELETE FROM sop_control WHERE notrans = '$notrans'";

                // Execute the query
                if (mysqli_query($conn, $sql)) {
                    // Record deleted successfully
                    echo "Record deleted successfully!";
                    // Optionally, redirect to the table page with a success message
                    header("Location: ../view/index.php?message=Record+deleted+successfully"); // Adjust the path as needed
                    exit; // Exit script after redirect
                } else {
                    // Deletion failed
                    echo "Error deleting record: " . mysqli_error($conn);
                }
            } else {
                // Required ID not provided
                echo "Error: Missing ID parameter";
            }
        } else {
            echo "Belum ada";
            header("Location: ../view/index.php?message=Record+deleted+successfully");
        }

    } else {
        // Not a POST request (unexpected access)
        echo "Error: This page can only be accessed through a POST request.";
    }
//} else {
    // User not logged in
//    header("Location: ../view/login.php"); // Redirect to login page
//    exit; // Exit script after redirect
//}

// Close the connection (if not already closed in your connection file)
mysqli_close($conn);
?>