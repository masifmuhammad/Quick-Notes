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
function setupButtonListeners() {
document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', (e) => {
        const noteId = e.target.dataset.id;
        // Edit the note with the given noteId
    });
});
// Get the edit buttons
document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', (e) => {
        // Close previous modal or form if it exists
        const existingForm = document.querySelector('.edit-note-form');
        if (existingForm) {
            existingForm.remove();
        }
        // Create new form
        const noteId = e.target.dataset.id;
        fetch(`get_note.php?note_id=${noteId}`)
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error ${response.status}`);
                }
                return response.text();
            })
            .then((noteContent) => {
                const editNoteForm = document.createElement('form');
                editNoteForm.classList.add('edit-note-form');
                editNoteForm.innerHTML = `
                    <input type="hidden" name="note_id" value="${noteId}">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="${e.target.parentElement.querySelector('h4').innerText}">
                    <label for="note">Note:</label>
                    <textarea id="note" name="note">${noteContent}</textarea>
                    <input type="submit" value="Update Note" name="submit">
                `;
                e.target.parentElement.appendChild(editNoteForm);
                editNoteForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    const formData = new FormData(e.target);
                    fetch('update_notes.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error(`HTTP error ${response.status}`);
                            }
                            return response.text();
                        })
                        .then((result) => {
                            console.log(result);
                            alert(result);
                            // Reload the page to display the updated note list
                            window.location.reload();
                        })
                        .catch((error) => {
                            console.error('Error updating note:', error);
                            alert('Error updating note:', error);
                        });
                });
            })
            .catch((error) => {
                console.error('Error fetching note content:', error);
                alert('Error fetching note content:', error);
            });
    });

        

document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', (e) => {
        const noteId = parseInt(e.target.dataset.id);
        if (isNaN(noteId)) {
            console.error('Invalid note ID');
            return;
        }
        fetch('delete_note.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `note_id=${noteId}`,
        })
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error ${response.status}`);
            }
            return response.text();
        })
        .then((result) => {
            if (result.trim() === 'Note deleted successfully') {
                const liElement = e.target.parentElement;
                if (liElement.parentElement !== null) {
                    liElement.remove();
                }
                console.log(result);
                alert(result);
            } else {
                console.error(result);
                alert(result);
            }
        })
        .catch((error) => {
            console.error('Error deleting the note:', error);
            alert('Error deleting the note:', error);
        });
    });

});
});





document.querySelectorAll('.save-btn').forEach(button => {
    button.addEventListener('click', (e) => {
        const noteId = e.target.dataset.id;
        // Save the note with the given noteId to the local device
        const noteTitle = e.target.parentElement.querySelector('h4').innerText;
        const noteText = e.target.parentElement.querySelector('p').innerText;

        const blob = new Blob([noteText], { type: 'text/plain;charset=utf-8' });
        const downloadUrl = URL.createObjectURL(blob);
        const downloadLink = document.createElement('a');
        downloadLink.href = downloadUrl;
        downloadLink.download = `${noteTitle}.txt`;

        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
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

}
window.onload = function() {
    setupButtonListeners();
}
window.onload = function() {
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const noteId = e.target.dataset.id;
            fetch(`get_note.php?note_id=${noteId}`)
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error ${response.status}`);
                }
                return response.text(); // expect plain text response, not JSON
            })
            .then((noteContent) => {
                // display the note content
            })
            .catch((error) => {
                console.error('Error fetching note content:', error);
                alert('Error fetching note content:', error);
            });
        });
    });
}
