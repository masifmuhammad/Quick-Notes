<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['note_id'])) {
    include("connection.php");

    $note_id = $_POST['note_id'];
    $username = $_SESSION['UserNameIndex'];

    $sql = "DELETE FROM notes WHERE note_id='$note_id' AND UserNameIndex='$username'";

    if ($conn->query($sql) === TRUE) {
        echo "Note deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
