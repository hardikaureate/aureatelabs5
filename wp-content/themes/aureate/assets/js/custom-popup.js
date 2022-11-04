// Thank You Page Popup
document.addEventListener('wpcf7mailsent', function (event) {
    document.querySelector('.thank-you-popup').classList.add('active');
    document.querySelector('body').classList.add('popup-active');
}, false);