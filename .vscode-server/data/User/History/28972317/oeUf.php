<!-- <style>
    body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 16px;
        color: #333;
        background-color: #fff;
        margin: 0;
        padding: 0;
    }
    
    h1 {
        text-align: center;
        font-size: 36px;
        font-weight: bold;
        margin: 50px 0 30px 0;
    }
    
    form {
        width: 80%;
        margin: 0 auto;
    }
    
    label, input[type="text"], textarea {
        display: block;
        margin: 10px 0;
        width: 100%;
    }
    
    input[type="text"], textarea {
        padding: 15px;
        font-size: 20px;
        border: none;
        background-color: #f3f3f3;
        border-radius: 5px;
        resize: none;
    }
    
    input[type="submit"] {
        padding: 10px 20px;
        background-color: #007aff;
        color: #fff;
        border: none;
        border-radius: 5px;
        margin-top: 20px;
        cursor: pointer;
        font-size: 20px;
        font-weight: bold;
        transition: all 0.2s ease-in-out;
    }
    
    input[type="submit"]:hover {
        background-color: #0062cc;
    }
    #notification {
    display: none;
    position: middle;
    top: 40px;
    right: 20px;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
}
    ul {
        list-style: none;
        margin: 30px 0;
        padding: 0;
    }
    
    li {
        margin-bottom: 30px;
        padding: 20px;
        border-radius: 5px;
        background-color: #f3f3f3;
        position: relative;
    }
    
    li h3 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    
    li a {
        position: absolute;
        top: 20px;
        right: 20px;
        padding: 10px 20px;
        background-color: #007aff;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.2s ease-in-out;
    }
    
    li a:hover {
        background-color: #0062cc;
    }
    
    .search-form {
        display: flex;
        align-items: center;
        margin-top: 20px;
        margin-bottom: 30px;
    }
    
    .search-form input[type="text"] {
        flex: 1;
        padding: 15px;
        font-size: 20px;
        border: none;
        background-color: #f3f3f3;
        border-radius: 5px;
        margin-right: 10px;
        font-weight: bold;
    }
    
    .search-form input[type="submit"] {
        padding: 10px 20px;
        background-color: #007aff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 20px;
        font-weight: bold;
        transition: all 0.2s ease-in-out;
    }
    
    .search-form input[type="submit"]:hover {
        background-color: #0062cc;
    }
    
    @media screen and (max-width: 768px) {
        form {
            width: 90%;
        }
        
        li {
            font-size: 14px;
        }
      }
   
</style> -->

<!DOCTYPE html>
<html>
<head>
    <title>Notetaking App</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>
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
    <input type="hidden" value="<?php if(isset($_GET['edit_id'])) { echo 'Update Note'; } else { echo 'Save Note'; } ?>" name="submit">
</form>
<form method="post" action="index.php">
    <input type="text" id="search" name="search">
    <input type="submit" value="Search" name="submit_search">
</form>

<?php
    // Debugging code
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    session_start();
    include("connection.php");

    // Connect to the database
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from form submission
    $title = $_POST['title'];
    $note = $_POST['note'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO notes (title, note) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $note);

    
   if ($stmt->execute() === TRUE) {
         echo "New record created successfully";
    } else {
       echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
?>

<ul id="notification">
    <li>Note saved!</li>
</ul>

<script>
    document.querySelector('input[type="submit"]').addEventListener('click', function() {
        // Show the notification
        let notification = document.querySelector('#notification');
        notification.style.display = 'block';

        
        setTimeout(function() {
            notification.style.display = 'none';
        }, 300000);
    });
</script>
</body>
</html>
