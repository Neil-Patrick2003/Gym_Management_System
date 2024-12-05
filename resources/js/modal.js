function handleModalActions() {
    // Open Modal: Find all open modal buttons
    document.querySelectorAll('.open-modal-btn').forEach(button => {
        button.addEventListener('click', function () {
            const targetModalId = this.getAttribute('data-target');
            const targetModal = document.getElementById(targetModalId);
            if (targetModal) {
                targetModal.classList.remove('hidden', 'opacity-0', 'pointer-events-none');
                targetModal.classList.add('opacity-100', 'pointer-events-auto', 'transition-opacity', 'transition-transform', 'transform', 'scale-120');
            }
        });
    });

    // Close Modal: Find all close modal buttons
    document.querySelectorAll('.close-modal-btn').forEach(button => {
        button.addEventListener('click', function () {
            const targetModalId = this.getAttribute('data-target');
            const targetModal = document.getElementById(targetModalId);
            if (targetModal) {
                targetModal.classList.add('hidden', 'opacity-0', 'pointer-events-none', 'scale-95');
                targetModal.classList.remove('opacity-100', 'pointer-events-auto');
            }
        });
    });

    // Optional: Close modal if clicked outside of modal content
    document.querySelectorAll('.fixed').forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden', 'opacity-0', 'pointer-events-none', 'scale-95');
                modal.classList.remove('opacity-100', 'pointer-events-auto');
            }
        });
    });
}

// Run the modal handling function on DOM load
document.addEventListener('DOMContentLoaded', handleModalActions);
