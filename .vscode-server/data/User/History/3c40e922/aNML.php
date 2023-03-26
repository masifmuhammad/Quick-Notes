<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['note_id']) && isset($_POST['note_content'])) {
    include("connection.php");

    $note_id = $_POST['note_id'];
    $note_content = $_POST['note_content'];
    $username = $_SESSION['UserName'];

    // Update the note with the given note ID
    $sql = "UPDATE notes SET note='$note_content' WHERE note_id='$note_id' AND UserName='$username'";

    if ($conn->query($sql) === TRUE) {
        echo "Note updated successfully";
    } else {
        echo "Error updating note: " . $conn->error;
    }

    $conn->close();
}
?>
