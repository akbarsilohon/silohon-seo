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

// Cek apakah ada status menu di localStorage
if (localStorage.getItem('menuStatus') === 'open') {
    menuFlex.classList.add('active');
}

menuOpen.addEventListener('click', function(){
    menuFlex.classList.add('active');
    // Simpan status menu di localStorage
    localStorage.setItem('menuStatus', 'open');
});

menuClose.addEventListener('click', function(){
    menuFlex.classList.remove('active');
    // Hapus status menu dari localStorage
    localStorage.removeItem('menuStatus');
});