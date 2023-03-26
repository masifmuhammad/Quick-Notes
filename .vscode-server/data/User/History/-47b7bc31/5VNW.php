<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Search Notes</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="stylecolumn.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      rel="stylesheet"
    />
</head>
<body>
;
<?php
session_start();

 include 'leftcolumn2.php'; ?>

<li>
    <h4><?= htmlspecialchars($note['title']); ?></h4>
    <?php
        $note_text = $note['note'];
    ?>
  
</li>

<!-- Search Content -->
<div class="main-content">
    <h2>Search Notes</h2>
    <form method="post" action="search.php">
        <input type="text" id="search" name="search" placeholder="Search for notes...">
        <input type="submit" value="Search" name="submit_search">
    </form>

    <?php
    //$output = str_replace('&nbsp;', ' ', $input);
     ini_set('display_errors', 1);
     ini_set('display_startup_errors', 1);
     error_reporting(E_ALL);
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_search"])) {
        include("connection.php");
        $search = $_POST["search"];
        $username = $_SESSION['UserName'];
        $search_result = [];

        $sql = "SELECT * FROM notes WHERE (title LIKE '%$search%' OR note LIKE '%$search%') AND UserName='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $search_result[] = $row;
            }
        }
        $conn->close();
    }
    ?>

<?php if (isset($search_result)): ?>
    <h3>Search Results:</h3>
    <ul class="notes-list">
        <?php foreach ($search_result as $note): ?>
            <li>
                <h4><?= htmlspecialchars($note['title']); ?></h4>
                <?php
                    $note_text = $note['note'];
                ?>
                  <p><?= $note_text; ?></p>
    <button class="edit-btn" data-id="<?= $note['id']; ?>">Edit</button>
    <button class="delete-btn" data-id="<?= $note['id']; ?>">Delete</button>

    <button class="save-btn" data-id="<?= $note['id']; ?>">Save</button>
    <button class="share-btn" data-id="<?= $note['id']; ?>">Share</button>
            </li>
        <?php endforeach; ?>
    </ul>
    <script src="searchjavascript.js"></script>
    <script>setupButtonListeners();</script>
<?php endif; ?>
</div>
    </div>

    
</body>
</html>
