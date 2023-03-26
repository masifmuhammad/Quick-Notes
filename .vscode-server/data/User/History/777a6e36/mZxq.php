<?php

// Start the session
session_start();

include ("connection.php");
// Check connection


// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the values from the form
  $UserName = $_POST['UserName'];
  $password = $_POST['password'];

  // Search the database for the entered username
  $sql = "SELECT * FROM user_accounts WHERE UserName='$UserName'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Get the hashed password from the database
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    // Check if the entered password matches the hashed password
   // ...
if (password_verify($password, $hashed_password)) {
  // Sign-in successful, store the username in the session
  $_SESSION['UserName'] = $UserName;

  // Redirect to the home page
  header("Location: index2.php");
  exit();

} else {
  // Incorrect password, set error message
  $error = "Incorrect password";
  header("Location: index.html?error=" . urlencode($error));
  exit();
}
// ...
} else {
  // Username not found, set error message
  $error = "Username not found";
  header("Location: index.html?error=" . urlencode($error));
  exit();
}
// ...
