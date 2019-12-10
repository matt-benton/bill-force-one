button = document.querySelector('.menu-icon');
nav = document.querySelector('.side-nav');

const toggleNav = function () {
    if (nav.style.display === "none" || nav.style.display === "") {
        nav.style.display = "flex";
    } else {
        nav.style.display = "none";
    }
}

button.addEventListener('click', toggleNav);
