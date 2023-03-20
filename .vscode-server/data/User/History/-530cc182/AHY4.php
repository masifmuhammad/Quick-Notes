<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notetaking App</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="stylesheet" href="stylecolumn.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>
    <?php include 'leftcolumn2.php'; ?>

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
        <form method="post" action="index2.php">
            <input type="text" id="search" name="search">
            <input type="submit" value="Search" name="submit_search">
        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="scriptcolumn.js"></script>
</body>
</html>
