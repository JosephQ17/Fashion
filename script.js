const modal = document.getElementById('modal');
const openModalButton = document.getElementById('open-modal');
const closeButton = document.querySelector('.close-button');
const confirmOrderButton = document.getElementById('confirm-order');

openModalButton.addEventListener('click', () => {
  modal.style.display = 'block';
});

closeButton.addEventListener('click', () => {
  modal.style.display = 'none';
});

confirmOrderButton.addEventListener('click', () => {
  alert('Order Confirmed!');
  modal.style.display = 'none';
});

// Optional: Close modal when clicking outside of it
window.addEventListener('click', (event) => {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});