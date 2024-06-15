<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <?php
  // Error handling for login attempts
  if (isset($_POST['login'])) {
    // Include the connection file
    require_once '../conn/conn.php';  // Use require_once to prevent duplicate inclusion

    // Escape user input for security (prevent SQL injection)
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    // $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Using md5 / simpe crypted word for password
    $password = md5($_POST['password']); 

    // Build a secure query with prepared statement (recommended)
    $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);  // Prepare the statement
    mysqli_stmt_bind_param($stmt, "ss", $username, $password); // Bind parameters

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);  // Get the result from the statement

    // Check for errors (combined from both responses)
    if (!$result) {
      echo "Error executing query: " . mysqli_error($conn);
      exit;
    } else if (mysqli_num_rows($result) === 0) {
      echo "<p style='color: red;'>Invalid username or password.</p>";
    } else {
      // Successful login (logic can be added here)
      session_start();  // Start the session
      $user = mysqli_fetch_assoc($result);  // Fetch user data (assuming unique username)
      $_SESSION['user_id'] = $user['id'];  // Store user ID in session (replace 'id' with actual ID field name)
      $_SESSION['user_name'] = $user['username'];
      header("Location: index.php");  // Redirect to index.php
    }

    // Close the statement (recommended)
    mysqli_stmt_close($stmt);
  }
  ?>

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <table>
      <tr>
        <td>Username</td>
        <td><input type="text" name="username"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="login" value="Log In"></td>
      </tr>
    </table>
  </form>
</body>
</html>