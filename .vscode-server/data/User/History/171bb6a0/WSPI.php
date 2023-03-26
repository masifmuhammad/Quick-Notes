<?php
    // Connect to the database and handle form submission
    session_start();
    include("connection.php");
    if (!isset($_SESSION['username'])) {
      header('Location: index.php');
      exit();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $title = $_POST["title"];
            $note = $_POST["note"];
            $username = $_SESSION['UserName'];

            $stmt = $conn->prepare("INSERT INTO notes (note_id, title, note, UserName) VALUES (NULL, ?, ?, ?)");
$stmt->bind_param("sss", $title, $note, $username);

            if ($stmt->execute() === TRUE) {
              $_SESSION['note_saved'] = true;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quick-Notes</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="stylecolumn.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

</head>
<body>  
<div class="notification" id="notification">Note saved successfully!</div>
    <div class="container">
      <ul class="link-items">
        <li class="link-item top">
          <a href="#" class="link">
            <img src="https://www.35mmc.com/wp-content/uploads/2021/10/00-logo.png" alt="" />
            <span style="--i: 9">
              <h4>Quick-Notes</h4>
            </span>
          </a>
        </li>
        <li class="link-item active">
          <a href="#" class="link">
            <ion-icon name="home-outline"></ion-icon>
            <span style="--i: 1">Notes</span>
          </a>
        </li>
        <li class="link-item">
    <a href="search.php" class="link">
        <ion-icon name="search-outline"></ion-icon>
        <span style="--i: 4">Search</span>
    </a>
</li>

        <li class="link-item">
          <a href="#" class="link"
            ><ion-icon name="layers-outline"></ion-icon>
            <span style="--i: 3">projects</span>
          </a>
        </li>
        <li class="link-item">
          <a href="#" class="link">
            <ion-icon name="checkbox-outline"></ion-icon
            ><span style="--i: 5">tasks</span>
          </a>
        
        <li class="link-item">
          <a href="#" class="link">
            <ion-icon name="cog-outline"></ion-icon>
            <span style="--i: 6">settings</span>
          </a>
        </li>

        <li class="link-item dark-mode">
          <a href="#" class="link">
            <ion-icon name="moon-outline"></ion-icon>
            <span style="--i: 8">dark mode</span>
          </a>
        </li>
      </ul>
    </div>
    
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <script src="scriptcolumn.js"></script>

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
        <!-- <form method="post" action="main.php">
            <input type="text" id="search" name="search">
            <input type="submit" value="Search" name="submit_search">
        </form> -->

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
    <script>
    function showNotification() {
        const notification = document.getElementById('notification');
        notification.classList.add('show');
        setTimeout(() => {
            notification.classList.remove('show');
        }, 4000);
    }
</script>

<script src="javascript2.js"></script>
<?php if (isset($_SESSION['note_saved']) && $_SESSION['note_saved']): ?>
<script>
    showNotification();
</script>
<?php unset($_SESSION['note_saved']); ?>
<?php endif; ?>


</body>
</html>
