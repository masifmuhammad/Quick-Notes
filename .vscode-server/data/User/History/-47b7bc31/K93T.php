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

                <?php
                // Check if $note['id'] is set
                if (isset($note['id'])) {
                    // Check if $note['id'] is a valid number
                    if (is_numeric($note['id'])) {
                        // $note['id'] is set and is a valid number
                        // proceed with generating the buttons
                        echo '<button class="edit-btn" data-id="' . $note['id'] . '">Edit</button>';
                        echo '<button class="delete-btn" data-id="' . intval($note['id']) . '">Delete</button>';
                        echo '<button class="save-btn" data-id="' . $note['id'] . '">Save</button>';
                        echo '<button class="share-btn" data-id="' . $note['id'] . '">Share</button>';
                    } else {
                        // $note['id'] is set but is not a valid number
                        // handle the error accordingly
                        echo "Error: note ID is not a valid number";
                        error_log(print_r($note, true)); // log the value of $note
                    }
                } else {
                    // $note['id'] is not set
                    // handle the error accordingly
                    echo "Error: note ID is not set";
                    error_log(print_r($note, true)); // log the value of $note
                }
                ?>

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
