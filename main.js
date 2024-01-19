const hamburger = document.querySelector('.hamburger');
const nav = document.querySelector('.nav-item');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    nav.classList.toggle('active');
});

document.querySelectorAll('.nav-item').forEach(ifClick => ifClick.
    addEventListener('click', () => {
        hamburger.classList.remove('active');
        nav.classList.remove('active');
    }))
    