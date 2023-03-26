<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['note_id']) && isset($_POST['title']) && isset($_POST['note'])) {
    include("connection.php");

    $note_id = $_POST['note_id'];
    $username = $_SESSION['UserName'];
    $title = $_POST['title'];
    $note = $_POST['note'];

    // Check if note_id exists in the database
    $sql = "SELECT * FROM notes WHERE note_id='$note_id' AND UserName='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // note_id exists in the database
        // proceed with the UPDATE query
        $sql = "UPDATE notes SET title='$title', note='$note' WHERE note_id='$note_id' AND UserName='$username'";

        if ($conn->query($sql) === TRUE) {
            echo "Note updated successfully";
        } else {
            echo "Error updating note: " . $conn->error;
        }
    } else {
        // note_id does not exist in the database
        // handle the error accordingly
        echo "Invalid note ID";
    }

    $conn->close();
}
?>
