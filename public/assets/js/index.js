// Select elements
const modal = document.getElementById('modal'); // Modal container
const openModalBtns = document.querySelectorAll('.openModal'); // All 'Edit' buttons
const closeModalBtn = document.querySelector('.close'); // Close button

// Open modal
function openModal() {
    if (modal) {
        modal.style.display = 'flex'; // Display the modal
    } else {
        console.error('Modal element not found.');
    }
}

// Close modal
function closeModal() {
    if (modal) {
        modal.style.display = 'none'; // Hide the modal
    } else {
        console.error('Modal element not found.');
    }
}

// Attach event listeners to each open button
openModalBtns.forEach((btn) => {
    btn.addEventListener('click', openModal);
});

// Close modal when clicking the close button
if (closeModalBtn) {
    closeModalBtn.addEventListener('click', closeModal);
} else {
    console.error('Close button not found.');
}

// Close modal when clicking outside the modal content
window.addEventListener('click', (e) => {
    if (e.target === modal) {
        closeModal();
    }
});
