<?php
session_start();
// Include the connection file
include("connection.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    $username = $_POST['UserName'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT password FROM user_accounts WHERE UserName=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, check the password
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

    // Display any errors
    if (isset($error)) {
        header("Location: login.html?error=" . urlencode($error));
        exit;
    }
}

// Close the connection
$stmt->close();
$conn->close();
?>
