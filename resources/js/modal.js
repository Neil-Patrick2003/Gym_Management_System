// Function to open and close modals
function handleModalActions() {
    // Open Modal: Find all open modal buttons
    document.querySelectorAll('.open-modal-btn').forEach(button => {
        button.addEventListener('click', function () {
            const targetModalId = this.getAttribute('data-target');
            const targetModal = document.getElementById(targetModalId);
            if (targetModal) {
                targetModal.classList.remove('hidden'); // Show modal
            }
        });
    });

    // Close Modal: Find all close modal buttons
    document.querySelectorAll('.close-modal-btn').forEach(button => {
        button.addEventListener('click', function () {
            const targetModalId = this.getAttribute('data-target');
            const targetModal = document.getElementById(targetModalId);
            if (targetModal) {
                targetModal.classList.add('hidden'); // Hide modal
            }
        });
    });

    // Optional: Close modal if clicked outside of modal content
    document.querySelectorAll('.fixed').forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });
}

// Run the modal handling function on DOM load
document.addEventListener('DOMContentLoaded', handleModalActions);
