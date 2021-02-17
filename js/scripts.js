// Navbar animation
const nav = document.querySelector('#menu-main');
let topOfNav = nav.offsetTop;
let scrolled = 1;

function fixNav() {
    if (window.scrollY > 370 && scrolled) {
        $(document).ready(function() {
            $('.count').countTo();
        });
        scrolled = 0;
    }
    if (window.scrollY >= topOfNav) {
        document.body.style.paddingTop = nav.offsetHeight + 'px';
        document.body.classList.add('fixed-nav');
    } else {
        document.body.classList.remove('fixed-nav');
        document.body.style.paddingTop = 0;
    }
    console.log(topOfNav);

}

window.addEventListener('scroll', fixNav);