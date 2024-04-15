// Add Class Active for menu items --------------------
// ----------------------------------------------------
document.addEventListener('DOMContentLoaded', function() {
    var menuItems = document.querySelectorAll('.slsMenu li');

    menuItems.forEach(function(item) {
        if (item.classList.contains('current-menu-item')) {
            item.classList.add('active');
            item.querySelector('.menu-link').classList.add('active');
        }
    });
});

// Menu show and hide --------------------
// ---------------------------------------
const menuOpen = document.getElementById('slsOpen');
const menuFlex = document.getElementById('slsFlexbox');
const menuClose = document.getElementById('slsClose');

menuOpen.addEventListener('click', function(){
    menuFlex.classList.add('active');
});

menuClose.addEventListener('click', function(){
    menuFlex.classList.remove('active');
});


// Header fixed ======================
window.addEventListener('scroll', function() {
    if (window.scrollY > 100 ) {
        document.querySelector('.sls_header').classList.add('scrolling');
    } else {
        document.querySelector('.sls_header').classList.remove('scrolling');
    }
});