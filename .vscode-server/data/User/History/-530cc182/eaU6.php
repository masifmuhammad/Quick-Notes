<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iOS-style Note Taking App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Notes</h1>
        <div class="note-container">
            <form action="save_note.php" method="post">
                <input type="text" name="title" placeholder="Title" class="note-title" required>
                <textarea name="note" placeholder="Write your note here..." class="note-text" required></textarea>
                <button type="submit" class="save-btn">Save</button>
            </form>
        </div>
        <div class="notes-list">
            <?php include 'fetch_notes.php'; ?>
        </div>
    </div>
</body>
</html>
