<?php
    // Connect to the database and handle form submission
    session_start();
    include("connection.php");

    // Form handling
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Notetaking App</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="stylecolumn.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <style>
        /* Add custom styles here */
        .main-content {
            width: 80%;
            margin: 0 auto;
            padding: 2rem;
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        label {
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="submit"],
        textarea {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            margin-bottom: 1rem;
        }
        
        input[type="submit"] {
            cursor: pointer;
            background-color: var(--primary-clr);
            color: white;
            border: none;
        }
        
        input[type="submit"]:hover {
            background-color: var(--hover-clr);
        }
        
        .notes-list {
            list-style: none;
            padding: 0;
        }
        
        .notes-list li {
            padding: 1rem;
            border: 1px solid #ccc;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Notetaking App</h2>
        <form method="post" action="main.php">
            <label for="title">Title:</label>
            <id="title" name="title" required>
            <label for="note">Note:</label>
        <textarea id="note" name="note" required></textarea>
        <script>
            CKEDITOR.replace('note');
        </script>

        <input type="submit" value="Save Note" name="submit">
    </form>
    <form method="post" action="main.php">
        <input type="text" id="search" name="search" placeholder="Search notes...">
        <input type="submit" value="Search" name="submit_search">
    </form>

    <?php if (isset($search_result)): ?>
        <h3>Search Results:</h3>
        <ul class="notes-list">
            <?php foreach ($search_result as $note): ?>
                <li>
                    <h4><?= htmlspecialchars($note['title']); ?></h4>
                    <p><?= htmlspecialchars(substr(strip_tags($note['note']), 0, 100)) . '...'; ?></p>
                    <a href="view_note.php?id=<?= $note['id']; ?>">Read More</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<script src="javascript2.js"></script>
</body>
</html>
