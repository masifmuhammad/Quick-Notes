<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['note_id'])) {
    $note_id = $_POST['note_id'];
    $username = $_SESSION['UserName'];

    // Check if note_id exists in the database
    $sql = "SELECT * FROM notes WHERE note_id='$note_id' AND UserName='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // note_id exists in the database
        // return the note
        $note = $result->fetch_assoc();
        echo json_encode($note);
    } else {
        // note_id does not exist in the database
        // handle the error accordingly
        header("HTTP/1.1 404 Not Found");
        echo "Invalid note ID";
    }
} else {
    // Invalid request method or missing parameters
    header("HTTP/1.1 400 Bad Request");
    echo "Invalid request";
}

$conn->close();
?>
