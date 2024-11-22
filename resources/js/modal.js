// modal.js

// Get modal and buttons
const modal = document.getElementById('myModal');
const openModalButton = document.getElementById('openModal');
const closeModalButton = document.getElementById('closeModal');

// Open modal when the button is clicked
openModalButton.addEventListener('click', () => {
    modal.classList.remove('hidden'); // Show the modal
});

// Close modal when the close button is clicked
closeModalButton.addEventListener('click', () => {
    modal.classList.add('hidden'); // Hide the modal
});

// Optional: Close modal if clicked outside of the modal content
modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.add('hidden');
    }
});
