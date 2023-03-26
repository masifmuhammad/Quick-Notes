<?php
session_start();
include ("connection.php");
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the values from the form
  $UserName = $_POST['UserName'];
  $password = $_POST['password'];

  // Prepare the statement to query the database for the user with the specified username
  $stmt = $conn->prepare("SELECT * FROM user_accounts WHERE UserName = ?");
  $stmt->bind_param("s", $UserName);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // User found, check the password
    $user = $result->fetch_assoc();
    $hashed_password = $user['password'];

    if (password_verify($password, $hashed_password)) {
      // Login success, start a session and redirect to the main page
      $_SESSION['UserName'] = $UserName;
      header('Location: main.php');
      exit;
    } else {
      // Invalid password, display error message
      $error = "Invalid password";
    }
  } else {
    // User not found, display error message
    $error = "User not found";
  }
}

?>
