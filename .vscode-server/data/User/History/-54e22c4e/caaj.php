<?php
require_once 'connection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sql = "SELECT * FROM notes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='note-card'>";
        echo "<h2 class='note-card-title'>" . $row["title"] . "</h2>";
        echo "<p class='note-card-text'>" . $row["note"] . "</p>";
        echo "</div>";
    }
} else {
    echo "No notes found.";
}

$conn->close();
