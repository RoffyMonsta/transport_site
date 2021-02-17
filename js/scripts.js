// Navbar animation
const nav = document.querySelector('#menu-main');
let topOfNav = nav.offsetTop;

function fixNav() {
    console.log(window.scrollY, topOfNav);
    if (window.scrollY >= topOfNav) {
        document.body.style.paddingTop = nav.offsetHeight + 'px';
        document.body.classList.add('fixed-nav');
    } else {
        document.body.classList.remove('fixed-nav');
        document.body.style.paddingTop = 0;
    }
    if (window.scrollY > 370) {
        $(document).ready(function() {
            $('.count').countTo();
        });
    }
}
window.addEventListener('scroll', fixNav);