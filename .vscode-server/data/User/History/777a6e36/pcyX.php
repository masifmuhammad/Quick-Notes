<?php

// Start the session
session_start();

include ("connection.php");
// Check connection


// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the values from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Search the database for the entered username
  $sql = "SELECT * FROM user_accounts WHERE username='$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Get the hashed password from the database
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    // Check if the entered password matches the hashed password
    if (password_verify($password, $hashed_password)) {
      // Sign-in successful, store the username in the session
$_SESSION['username'] = $username;

// Redirect to the home page
header("Location: main.php");
exit();

    } else {
      // Incorrect password, set error message
      $error = "Incorrect password";
    }
  } else {
    // Username not found, set error message
    $error = "Username not found";
  }

  // Close the connection
  $conn->close();
}

?>
