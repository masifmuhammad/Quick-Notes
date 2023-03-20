<?php
    // Connect to the database and handle form submission
    session_start();
    include("connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $title = $_POST["title"];
            $note = $_POST["note"];

            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO notes (title, note) VALUES (?, ?)");
            $stmt->bind_param("ss", $title, $note);

            if ($stmt->execute() === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } elseif (isset($_POST["submit_search"])) {
            $search = $_POST["search"];
            $search_result = [];

            $sql = "SELECT * FROM notes WHERE title LIKE '%$search%' OR note LIKE '%$search%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $search_result[] = $row;
                }
            }
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notetaking App</title>
    <link rel="stylesheet" href="style2.css">
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>
    <?php include("leftcolumn.php"); ?>

    <div class="main-content">
        <h2>Notetaking App</h2>
        <form method="post" action="main.php">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title">

            <label for="note">Note:</label>
            <textarea id="note" name="note"></textarea>
            <script>
                CKEDITOR.replace('note');
            </script>

            <input type="submit" value="Save Note" name="submit">
        </form>
        <form method="post" action="main.php">
            <input type="text" id="search" name="search">
            <input type="submit" value="Search" name
