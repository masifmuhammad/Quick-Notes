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

document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', (e) => {
        const noteId = e.target.dataset.id;
        // Edit the note with the given noteId
    });
});

document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', (e) => {
        const noteId = e.target.dataset.id;
        // Delete the note with the given noteId
    });
});

document.querySelectorAll('.save-btn').forEach(button => {
    button.addEventListener('click', (e) => {
        const noteId = e.target.dataset.id;
        // Save the note with the given noteId to the local device
        // You can use, for example, the FileSaver.js library to save files locally
        // Reference: https://github.com/eligrey/FileSaver.js/
    });
});

document.querySelectorAll('.share-btn').forEach(button => {
    button.addEventListener('click', (e) => {
        const noteId = e.target.dataset.id;
        // Share the note with the given noteId
        // You can use the Web Share API for sharing content
        // Reference: https://developer.mozilla.org/en-US/docs/Web/API/Navigator/share

        if (navigator.share) {
            const noteTitle = e.target.parentElement.querySelector('h4').innerText;
            const noteText = e.target.parentElement.querySelector('p').innerText;
            const shareData = {
                title: noteTitle,
                text: noteText,
                url: window.location.href,
            };

            navigator.share(shareData)
                .then(() => console.log('Successful share'))
                .catch((error) => console.log('Error sharing:', error));
        } else {
            console.log('Web Share API not supported');
        }
    });
});

