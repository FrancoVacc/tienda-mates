const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');
const menuNav = document.getElementById('menu-nav');

menuBtn.addEventListener('click', () => {
    menuNav.classList.remove('hidden');
    closeBtn.classList.remove('hidden');
    menuBtn.classList.add('hidden');
})
closeBtn.addEventListener('click', () => {
    menuNav.classList.add('hidden');
    menuBtn.classList.remove('hidden');
    closeBtn.classList.add('hidden');
})
