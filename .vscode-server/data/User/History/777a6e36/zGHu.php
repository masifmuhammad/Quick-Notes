
<?php
session_start();
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include ("connection.php");
$error = "";
// Check if the user has submitted the form
// Check if the user has submitted the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the values from the form
  $UserName = $_POST['UserName'];
  $password = $_POST['password'];

  // Query the database for the user with the specified username
  $sql = "SELECT * FROM user_accounts WHERE UserName = '$UserName'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // User found, check the password
    $user = $result->fetch_assoc();
    $hashed_password = $user['password'];

    if (password_verify($password, $hashed_password)) {
      // Login success, start a session and redirect to the main page
      $_SESSION['UserName'] = $UserName;
      header('Location: index2.php');
      exit;
    } else {
      header('Location: index.php');
      // Invalid password, display error message
      $error = "Invalid password";
    }
  } else {
    // User not found, display error message
    $error = "User not found";
  }
}