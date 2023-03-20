<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notetaking App</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Notes</a></li>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Tasks</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Dark Mode</a></li>
        </ul>
    </div>
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
            <input type="submit" value="Search" name="submit_search">
        </form>

        <?php if (isset($search_result)): ?>
            <h3>Search Results:</h3>
            <ul class="notes-list">
                <?php foreach ($search_result as $note): ?>
                    <li>
                        <h4><?= htmlspecialchars($note['title']); ?></h4>
                        <p><?= htmlspecialchars(substr(strip_tags($note['note']), 0, 100)) . '...'; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>
