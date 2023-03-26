<?php
session_start();
// Include the connection file
include("connection.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    $UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Find the user in the database
    $sql = "SELECT password FROM user_accounts WHERE UserName='$username'";
    $result = $conn->query($sql);
    
    // Debug code
    echo "Query string: $sql<br>";
    echo "Query result: ";
    var_dump($result);
    
    if ($result) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            if (password_verify($password, $hashed_password)) {
                // Password is correct, log the user in
                $_SESSION['UserName'] = $username;
                header('Location:/quicknotes/Testing/main.php');
                exit;
            } else {
                // Password is incorrect
                $error = "Incorrect password";
            }
        } else {
            // No user found
            $error = "User not found";
        }
    } else {
        // Query failed
        $error = "Query failed: " . $conn->error;
    }
    
    // Display any errors
    if (isset($error)) {
        header("Location: login.html?error=" . urlencode($error));
        exit;
    }
       
}

// Close the connection
$conn->close();
?>
