// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.main-navigation ul');

    menuToggle.addEventListener('click', function () {
        navMenu.classList.toggle('toggled');
        menuToggle.classList.toggle('toggled');
    });
});
