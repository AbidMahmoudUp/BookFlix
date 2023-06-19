const modalBtn = document.getElementById('modalBtn');
const closeBtn = document.querySelector('.closeIcon');
const okBtn = document.getElementById('okBtn');
const modal = document.querySelector('.modal');

modalBtn.addEventListener('click', () => {
    modal.classList.add('active');
});

closeBtn.addEventListener('click', () => {
    modal.classList.remove('active')
});

okBtn.addEventListener('click', () => {
    modal.classList.remove('active')
});

window.addEventListener('click', event => {
    if(event.target == modal) {
        modal.classList.remove('active')
    }
})