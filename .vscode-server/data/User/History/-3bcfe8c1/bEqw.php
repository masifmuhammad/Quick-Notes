<?php
  // Include the connection file
  include ("connection.php");

  // Check if the form was submitted
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    $Full_Name = mysqli_real_escape_string($conn, $_POST['FullName']);
    $PhoneNumber = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $sql = "INSERT INTO user_accounts (FullName, PhoneNumber, username, password) VALUES ('$Full_Name', '$PhoneNumber', '$username', '$hashed_password')";


    if ($conn->query($sql) === TRUE) {
      $_SESSION['user_id'] = $user['id'];
      header('Location:/u2257131/NoteTakingApp/loginx.php');
      exit;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
  }
?>