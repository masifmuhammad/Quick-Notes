<?php
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
    $sql = "INSERT INTO user_accounts (UserName, PhoneNumber, Email, password) VALUES ('$UserName', '$PhoneNumber', '$username', '$hashed_password')";


    if ($conn->query($sql) === TRUE) {
      $_SESSION['user_id'] = $user['id'];
      header('Location:/quicknotes/Testing/index2.php');
      exit;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
  }
?>