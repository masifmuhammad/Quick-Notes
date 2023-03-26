<?php
  include 'connection.php'; // include the file containing the database connection code

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $phone_number = $_POST["phone_number"];
    $password = $_POST["password"];

    // check if the username already exists in the database
    $query = "SELECT * FROM users WHERE UserNameIndex = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      echo "Username already exists!";
    } else {
      // insert the new user data into the database
      $query = "INSERT INTO users (UserNameIndex, PhoneNumber, Password) VALUES ('$username', '$phone_number', '$password')";
      if (mysqli_query($conn, $query)) {
        echo "User registration successful!";
      } else {
        echo "Error: " . mysqli_error($conn);
      }
    }

    mysqli_close($conn); // close the database connection
  }
?>

<!-- HTML form for the sign up page -->
<form method="POST" action="">
  <div class="user-box">
    <input type="text" name="username" required="">
    <label>Username</label>
  </div>
  <div class="user-box">
    <input type="text" name="phone_number" required="">
    <label>Phone Number</label>
  </div>
  <div class="user-box">
    <input type="password" name="password" required="">
    <label>Password</label>
  </div>
  <center>
    <button type="submit" name="signup">
      SIGN UP
    </button>
  </center>
</form>
