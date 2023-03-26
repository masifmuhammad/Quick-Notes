<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("connection.php");

   // $note_id = $_POST["note_id"];
    $username = $_SESSION['UserName'];

    $sql = "DELETE FROM notes WHERE UserName='$username'";

    if ($conn->query($sql) === TRUE) {
        echo "Note deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
