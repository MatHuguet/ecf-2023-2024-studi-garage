
const star = document.getElementsByClassName('star-item');
const starQ = document.querySelectorAll('.star-item');
const starCount = document.querySelector('.star-count-text')

//Valeur par défaut de l'attribut 'value' de l'input
starCount.setAttribute('value', '1');

//boucle sur les 5 éléments (étoiles) et séparation avec for of
for (let starElement of star) {
    //Ajout d'un listener sur chaque étoile, au clic
    starElement.addEventListener('click', e => {
        //On déclare une variable 'value'
        let value = 0;
        //On attribue à 'value' la valeur de l'élément cliqué
        value = e.target.value;
        //On boucle sur chaque étoile avec foreach
        starQ.forEach((starEl => {
            //Si l'étoile à une valeur inférieure à la valeure de l'étoile cliquée...
            if (starEl.value <= value) {
                //...On attribut aux étoiles la classe 'active' (étoile pleine)
                starEl.classList.add('active')
            }
        }))
        //De même si les étoiles ont une valeur supérieure à l'élément cliqué...
        starQ.forEach((starEl => {
            if (starEl.value > value) {
                //...on enlève la classe 'active'
                starEl.classList.remove('active')
            }
        }))
    })
}

//Display value in an input to get this value from php form
starQ.forEach((item) => {
    item.addEventListener('click', e => {
        //Au clic on donne un attribut 'value' à l'élément 'input', la valeur correspond à la valeur de l'attribut
        // data-rate dans la liste des éléments (étoiles)
        starCount.setAttribute('value', e.target.getAttribute('data-rate'));
        //item.classList.add('active')
    })
})





