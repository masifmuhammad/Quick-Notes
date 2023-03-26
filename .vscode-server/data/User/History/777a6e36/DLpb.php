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
    $sql = "SELECT * FROM user_accounts WHERE UserName='$UserName'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, log the user in
            $_SESSION['UserName'] = $UserName;
            header('Location:/quicknotes/Testing/main.php');
            exit;
        } else {
            // Password is incorrect
            $error = "Incorrect password";
        }
    } else {
        // User not found
        $error = "User not found";
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
