
<?php
  include 'connection.php'; // include the file containing the database connection code

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // check if the username and password match a row in the database
    $query = "SELECT * FROM users WHERE UserNameIndex = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      echo "User login successful!";
      // set session variables to store the user's information
      session_start();
      $_SESSION["UserNameIndex"] = $username;
      $_SESSION["PhoneNumber"] = mysqli_fetch_assoc($result)["PhoneNumber"];
      header("Location: dashboard.php"); // redirect to the user's dashboard
    } else {
      echo "Invalid username or password!";
    }

    mysqli_close($conn); // close the database connection
  }
?>

<!-- HTML form for the sign in page -->
<form method="POST" action="">
  <div class="user-box">
    <input type="text" name="username" required="">
    <label>Username</label>
  </div>
  <div class="user-box">
    <input type="password" name="password" required="">
    <label>Password</label>
  </div>
  <center>
    <button type="submit" name="signin">
      SIGN IN
    </button>
  </center>
</form>
