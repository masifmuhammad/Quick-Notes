<!DOCTYPE html>
<html>
<head>
    <title>Notetaking App</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>
    <header>
        <h1>Notetaking App</h1>
    </header>
    <main>
        <form method="post" action="main.php">
            <div class="input-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php if(isset($_GET['edit_id'])) { echo $note_data['title']; } ?>">
            </div>

            <div class="input-group">
                <label for="note">Note:</label>
                <textarea id="note" name="note"><?php if(isset($_GET['edit_id'])) { echo $note_data['note']; } ?></textarea>
                <script>
                    CKEDITOR.replace('note');
                </script>
            </div>

            <input type="hidden" name="note_id" value="<?php if(isset($_GET['edit_id'])) { echo $note_data['id']; } ?>">
            <div id="notification"></div>
            <input type="hidden" value="<?php if(isset($_GET['edit_id'])) { echo 'Update Note'; } else { echo 'Save Note'; } ?>" name="submit">
        </form>
        <form method="post" action="index.php" class="search-form">
            <input type="text" id="search" name="search">
            <input type="submit" value="Search" name="submit_search">
        </form>
    </main>
    
    <?php
        // Add your PHP code here
    ?>

    <script>
        // Add your JavaScript code here
    </script>
</body>
</html>
