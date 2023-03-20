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
    margin-bottom: 2rem;

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
    margin-right: auto;
    margin-left: 5rem;

}
.container p a{
    text-decoration: none;
    color: #00acee;
}






    </style>
<head>
<body>
    <div class="container">
        <div class="box box-one">
            <div class="container">
                    <h3 class="logo">The<span>Debuggers</span></h3>
                    <div>
             <!-- <i class="fab fa-twitter"><img src="https://img.icons8.com/color/50/000000/twitter--v1.png"/></i>  -->
                    </div>
  <title>Create Account</title>
</head>
<body >
  <p>Create an Account</p>
  <div class="box box-two">
  <form  method="post">

    <input type="text" id="username" name="username" placeholder="Phone,email, or username">
 
  
    <input type="password" id="password" name="password" required placeholder="Password">
  
 
    <button class="next-btn" input type="submit" value="Create Account"> Create Account </button>
  </form>
</body>
</html>
<?php
  // Include the connection file
  include ("connection.php");

  // Check if the form was submitted
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $sql = "INSERT INTO user_accounts (username, password) VALUES ('$username', '$hashed_password')";

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