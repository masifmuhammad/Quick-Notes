<?php
session_start();
  // Include the connection file
  include ("connection.php");

  // Check if the form was submitted
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    $UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
    $PhoneNumber = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $sql = "INSERT INTO user_accounts (UserName, PhoneNumber, Email, password) VALUES ('$UserName', '$PhoneNumber', '$Email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
      $user_id = $conn->insert_id; // Get the unique value assigned to user_id
      $_SESSION['UserName'] = $UserName;
      header('Location:/quicknotes/Testing/main.php');
      exit;
    } else {
      $error = "Error creating user account: " . $conn->error;
    header("Location: index.php?error=" . urlencode($error));
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
  }
?>
