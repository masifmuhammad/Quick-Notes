<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notetaking App</title>
    <link rel="stylesheet" href="style2.css">
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>
    <?php include 'leftcolumn.php'; ?>

    <div class="main-content">
        <h1>Notetaking App</h1>
        <form method="post" action="main.php">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php if(isset($_GET['edit_id'])) { echo $note_data['title']; } ?>">

            <label for="note">Note:</label>
            <textarea id="note" name="note"><?php if(isset($_GET['edit_id'])) { echo $note_data['note']; } ?></textarea>
            <script>
                CKEDITOR.replace('note');
            </script>

            <input type="hidden" name="note_id" value="<?php if(isset($_GET['edit_id'])) { echo $note_data['id']; } ?>">
            <div id="notification"></div>
            <input type="submit" value="<?php if(isset($_GET['edit_id'])) { echo 'Update Note'; } else { echo 'Save Note'; } ?>" name="submit">
        </form>
        <form method="post" action="index.php">
            <input type="text" id="search" name="search">
            <input type="submit" value="Search" name="submit_search">
        </form>

        <!-- PHP code for handling form submission -->
        <?php
            session_start();
            include("connection.php");

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                $title = $_POST['title'];
                $note = $_POST['note'];

                $stmt = $conn->prepare("INSERT INTO notes (title, note) VALUES (?, ?)");
                $stmt->bind_param("ss", $title, $note);

                if ($stmt->execute() === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
                $conn->close();
            }
        ?>
        <ul id="notification">
            <li>Note saved!</li>
        </ul>

        <script>
            document.querySelector('input[type="submit"]').addEventListener('click', function() {
                let notification = document.querySelector('#notification');
                notification.style.display = 'block';

                setTimeout(function() {
                    notification.style.display = 'none';
                }, 3000);
            });
        </script>
    </div>
</body>
</html>
