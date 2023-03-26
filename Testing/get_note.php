<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['note_id'])) {
    include("connection.php");

    $note_id = $_GET['note_id'];
    $username = $_SESSION['UserName'];

    // Check if note_id exists in the database
    $sql = "SELECT * FROM notes WHERE note_id='$note_id' AND UserName='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // note_id exists in the database
        // fetch the note content
        $row = $result->fetch_assoc();
        $note_content = $row['note'];
        echo $note_content;
    } else {
        // note_id does not exist in the database
        // handle the error accordingly
        header("HTTP/1.0 400 Bad Request");
        echo "Invalid request";
    }

    $conn->close();
} else {
    header("HTTP/1.0 400 Bad Request");
    echo "Invalid request";
}
?>
