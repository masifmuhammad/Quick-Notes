<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    color: #fff;
    padding: 10px;
}

header h1 {
    margin: 0;
}

header button {
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

main {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

#note-form {
    margin-bottom: 20px;
}

#note-form input,
#note-form textarea {
    display: block;
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: none;
    border-radius: 5px;
}

#note-form button {
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 10px;
}

#notes-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.note {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    width: calc(33.33% - 20px);
    min-height: 200px;
}

.note h2 {
    margin-top: 0;
}

.note p {
    margin: 10px 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Style for notes */
.note {
  background-color: #f9f9f9;
  border-left: 6px solid #2196F3;
  margin: 15px 0;
  padding: 10px;
}

.note h2 {
  margin-top: 0;
}

.note p {
  margin-bottom: 0;
}

.note-action a {
  margin-right: 10px;
}

/* Style for search bar */
.search-container {
  margin-top: 20px;
}

.search-container input[type=text] {
  padding: 10px;
  width: 60%;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
}

.search-container button[type=submit] {
  padding: 10px 20px;
  margin-left: 10px;
  background-color: #2196F3;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.search-container button[type=submit]:hover {
  background-color: #0b7dda;
}

/* Style for form buttons */
.form-buttons {
  margin-top: 20px;
  text-align: right;
}

.form-buttons button[type=submit] {
  padding: 10px 20px;
  background-color: #2196F3;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.form-buttons button[type=submit]:hover {
  background-color: #0b7dda;
}

.form-buttons input[type=submit] {
  padding: 10px 20px;
  background-color: #2196F3;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.form-buttons input[type=submit]:hover {
  background-color: #0b7dda;
}

.form-buttons input[type=hidden] {
  display: none;
}

/* Style for hide class */
.hide {
  display: none;
}
</style>
<?php
session_start();
include ("connection.php");
    //database connection
    // $conn = mysqli_connect("localhost", "username", "password", "database_name");
    // //check connection
    // if(!$conn){
    //     echo 'Connection error: ' . mysqli_connect_error();
    // }

    //initialize variables
    $title = "";
    $note = "";
    $note_id = 0;
    $update_note = false;

    //if save note button is clicked
    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $note = $_POST['note'];

        if(empty($title) || empty($note)) {
            echo "Please fill up both the Title and Note fields!";
        } else {
            $sql = "INSERT INTO notes (title, note) VALUES ('$title', '$note')";
            mysqli_query($conn, $sql);
            header('location: index.php');
            exit();
        }
    }

    //if edit note button is clicked
    if(isset($_GET['edit_id'])) {
        $note_id = $_GET['edit_id'];
        $update_note = true;
        $sql = "SELECT * FROM notes WHERE id=$note_id";
        $result = mysqli_query($conn, $sql);
        $note_data = mysqli_fetch_assoc($result);
        $title = $note_data['title'];
        $note = $note_data['note'];
    }

    //if update note button is clicked
    if(isset($_POST['update'])) {
        $note_id = $_POST['note_id'];
        $title = $_POST['title'];
        $note = $_POST['note'];

        if(empty($title) || empty($note)) {
            echo "Please fill up both the Title and Note fields!";
        } else {
            $sql = "UPDATE notes SET title='$title', note='$note' WHERE id=$note_id";
            mysqli_query($conn, $sql);
            header('location: index.php');
            exit();
        }
    }

    //if delete note button is clicked
    if(isset($_GET['delete_id'])) {
        $note_id = $_GET['delete_id'];
        $sql = "DELETE FROM notes WHERE id=$note_id";
        mysqli_query($conn, $sql);
        header('location: index.php');
        exit();
    }

    //if search button is clicked
    if(isset($_POST['submit_search'])) {
        $search_term = $_POST['search'];
        $sql = "SELECT * FROM notes WHERE title LIKE '%$search_term%' OR note LIKE '%$search_term%'";
    } else {
        $sql = "SELECT * FROM notes";
    }
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notetaking App</title>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Notetaking App</h1>
    <div class="note-form <?php if(!$update_note) { echo 'hide'; } ?>">
        <form method="post" action="index.php">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>">
            
            <label for="note">Note:</label>
            <textarea id="note" name="note"><?php echo htmlspecialchars($note); ?></textarea>
            <script>CKEDITOR.replace('note');</script>

            <div class="form-buttons">
               
<!--HTML code for displaying the notes-->
<div class="notes-container">
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="note">
            <h2><?php echo $row['title']; ?></h2>
            <p><?php echo $row['note']; ?></p>
            <div class="note-action">
                <a href="index.php?edit_id=<?php echo $row['id']; ?>">Edit</a>
                <a href="index.php?delete_id=<?php echo $row['id']; ?>">Delete</a>
            </div>
        </div>
    <?php } ?>
</div>
<!--HTML code for search bar-->
<div class="search-container">
    <form method="post" action="index.php">
        <input type="text" placeholder="Search notes" name="search">
        <button type="submit" name="submit_search">Search</button>
    </form>
</div>
<!--HTML code for displaying form buttons-->
<div class="form-buttons">
    <?php if($update_note == true) { ?>
        <button type="submit" name="update">Update Note</button>
        <input type="hidden" name="note_id" value="<?php echo $note_id; ?>">
    <?php } else { ?>
        <button type="submit" name="submit">Save Note</button>
    <?php } ?>
</div>
<script>
    //JavaScript code for toggling the form display
    const toggleForm = () => {
        const form = document.querySelector('.note-form');
        form.classList.toggle('hide');
    }
</script>
</body>
</html>