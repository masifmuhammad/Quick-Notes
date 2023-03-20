document.getElementById('notes-link').addEventListener('click', function() {
    let mainContent = document.querySelector('.main-content');
    mainContent.innerHTML = `
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
        </form>`;
});
