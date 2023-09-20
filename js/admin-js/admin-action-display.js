let actionDisplayContainer = document.getElementById('action-display')
let modal = document.querySelectorAll('option')

window.addEventListener('click', e => {
    let targetValue = e.target.value


    //Créer un switch entre les différentes actions
    //affichage entre balise php avec include de la modale
    switch (targetValue) {
        case 'moderation':
            e.target.classList.add('action-modal-toggle')
            break;
        case 'ad-management':
            console.log('manage ads')
            break;

        case 'add-account':
            console.log('add account')
            break;

        case 'opening-management':
            console.log('manage opening')
            break;

        case 'services-management':
            console.log('manage services')
            break;

        case 'admin-password-update':
            console.log('update password')
            break;

        default:
            console.log('no selection')
    }


})
