import './bootstrap';

const bcLogo = document.querySelector('#bcLogo');

bcLogo.addEventListener('click', () => {
    const path = new URL(bcLogo.src).pathname;

    if (path === "/favicon.png") {
        bcLogo.classList.add('fade-out');
        setTimeout(() => {
            bcLogo.src = "/rocket.png";
            bcLogo.classList.remove('fade-out');
        }, 500);
    } else {
        bcLogo.classList.add('fade-out');
        setTimeout(() => {
            bcLogo.src = "/favicon.png";
            bcLogo.classList.remove('fade-out');
        }, 500);
    }
});


const openTermsButton = document.querySelector('#viewTerms');
const termsModal = document.getElementById('terms-modal');
const closeModalButton = document.getElementById('close-modal');

openTermsButton.addEventListener('click', (e) => {
    e.preventDefault();
    termsModal.style.display = 'block';
});

closeModalButton.addEventListener('click', () => {
    termsModal.style.display = 'none';
});

window.addEventListener('click', (e) => {
    if (e.target === termsModal) {
        termsModal.style.display = 'none';
    }
});