const userRate = document.querySelector('.rate');

const progressBar = document.querySelector('.progress');

    progressBar.style.left = (userRate.innerHTML * 20 -0.5) + '%';
