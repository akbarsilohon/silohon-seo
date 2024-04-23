document.getElementById('hapusInput').addEventListener('click', function() {
    document.getElementById('input-bisa-dihapus').value = '';
});

window.addEventListener('scroll', function() {
    if ( window.scrollY > 100 ) {
        document.querySelector('.slsGoogle').classList.add('scrolling');
        if (window.innerWidth <= 780) {
            document.querySelector('.slsHomes').style.display = 'none';
            document.querySelector('.gInner_right').style.display = 'none';
        }
    } else {
        document.querySelector('.slsGoogle').classList.remove('scrolling');
        if (document.querySelector('.slsHomes').style.display ==='none' ) {
            document.querySelector('.slsHomes').style.display = 'block';
            document.querySelector('.gInner_right').style.display = 'block';
        }
    }
});