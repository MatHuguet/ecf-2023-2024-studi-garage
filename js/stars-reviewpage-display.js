const userRate = document.querySelectorAll('.rate');

const progressBar = document.querySelectorAll('.progress');

for (i = 0; i < progressBar.length; i++) {
    progressBar[i].style.left = (userRate[i].innerHTML * 20) + '%';
}