document.addEventListener('DOMContentLoaded', function () {
    setTimeout(() => {
        const alert = document.getElementById('alert');
        if (alert) {
            alert.style.transition = 'opacity 1s ease';
            alert.style.opacity = '0';


            setTimeout(() => alert.remove(), 1000);
        }
    }, 2000);
});
