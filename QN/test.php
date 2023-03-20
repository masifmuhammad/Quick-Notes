<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    body{
        background: radial-gradient(
    circle at 10% 20%,
    rgb(87, 108, 117) 0%,
    rgb(37, 50, 55) 100.2%
  );
}
.container{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background: #fff;
    width: 450px;
    height: 550px;
    border-radius: 20px;
    box-shadow: 0 10px rgb(110, 110, 110,.2);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins', sans-serif;
}
.container {
 position: center;
  background: white;

  overflow-x: hidden;
  transform-style: preserve-3d;
}

.navbar {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 10;
  height: 3rem;
}

.menu {
  max-width: 72rem;
  width: 100%;
  margin: 0 auto;
  padding: 0 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #fff;
}

.logo {
  font-size: 1.1rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  line-height: 4rem;
}

.logo span {
  font-weight: 300;
}
.box, .box button{
    display: flex;
    align-items: center;
}
.box{
    width: 300px;
    height: 240px;
    flex-direction: column;
    justify-content: space-evenly;
}
.box button{
    width: 300px;
    height: 40px;
    background-color: #fff;
    outline: none;
    font-weight: bold;
    border: 1px solid rgb(211, 210, 210);
    border-radius: 20px;
    justify-content: center;
    font-family: 'Poppins', sans-serif;
}
.box-one button img{
    margin: 0 .25rem;
}
.box-one i{
    color: #00acee;
    font-size: 1.8rem;
}
.box-two input{
    position: relative;
    width: 300px;
    height: 55px;
    outline: none;
    border: 1px solid rgb(211, 210, 210);
    border-radius: 4px;
    padding-left: 10px;

}
.box-two input label{
    position: absolute;
    top: 0;
}
.box-two input::placeholder{
    font-size: 1rem;
}
.box-two input:focus{
    border: 1px solid #00acee;
}
.box-two .next-btn{
    background-color: #121212;
    color: #fff;
}
.container p{
    font-size: .7rem;
    color: rgb(138, 136, 136);
}
.container p a{
    text-decoration: none;
    color: #00acee;
}
    </style>
 


<body>
    <div class="container">
        <div class="box box-one">
            <div class="container">
                    <h3 class="logo">The<span>Debuggers</span></h3>
                    <div>
             <!-- <i class="fab fa-twitter"><img src="https://img.icons8.com/color/50/000000/twitter--v1.png"/></i>  -->
                    </div>

  <div class="box box-two">
  <form method="post" action="main.php">
  <!-- <label for="username">Username:</label> -->
  <input type="text" id="username" name="username" required placeholder="Phone,email, or username">
  .
  <input type="password" id="password" name="password" required placeholder="Password">
  .
  <button class="next-btn" input type="submit" value="Login"> Login </button>
  </form>
</div>
        <p>Don't have an account <a href="signup.php">Sign Up</a></p>
    </div>
</body>

</html>
</body>
<!-- <script src="script.js"></script> -->
</html>


<?php

// Start the session
session_start();

// Connect to the database
$servername = "localhost";
$username = "u2257131";
$password = "MV04dec01mv";
$dbname = "u2257131";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

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
header("Location: test.php");
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
