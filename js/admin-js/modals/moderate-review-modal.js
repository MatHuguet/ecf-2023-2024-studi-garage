const moderateReviewModal = document.getElementById('moderate-review-container')
const moderateInputsContainer = document.getElementById('moderate-inputs-container')
const eyeImgBtn = document.querySelectorAll('#img-moderate-btn')


//Ouverture de la modale + review infos onclick :


//Loop through each buttons :

for (let r = 0; r < eyeImgBtn.length; r++) {
    eyeImgBtn[r].addEventListener('click',e => {
        //Get each dataset depending on where the btn was clicked
        const userReviewMail = e.target.dataset.email
        const userReviewName = e.target.dataset.name
        const userReviewFirstname = e.target.dataset.firstname
        const reviewNote = e.target.dataset.reviewnote
        const reviewDate = e.target.dataset.reviewdate
        const userVisitDate = e.target.dataset.visitdate
        const reviewText = e.target.dataset.text
        const reviewId = e.target.dataset.reviewid


        moderateReviewModal.classList.remove('moderate-review-container-toggle')
        moderateInputsContainer.innerHTML = null

        //Add form with employee informations :

        moderateReviewModal.classList.add('moderate-review-container-toggle')


        moderateInputsContainer.innerHTML =
            "<label for='review-name' class='form-label'>Nom :</label>" +
            "<input type='text' class='review-input' name='review-name' id='review-name' value='" + userReviewName + "' readonly>" +

            "<label for='review-firstname' class='form-label'>Prénom :</label>" +
            "<input type='text' class='review-input' name='review-firstname' id='review-firstname' value='" + userReviewFirstname + "' readonly>" +

            "<label for='review-email' class='form-label'>Email :</label>" +
            "<input type='text' class='review-input' name='review-email' id='review-email' value='" + userReviewMail + "' readonly>" +

            "<div class='review-text-container'>" +
            "<p class='review-text-label'>Commentaire :</p>" +
            "<p class='review-text'>\" " + reviewText + " \"</p>" +
            "</div>"+

            "<label for='action-select' class='action-selection-list'>Liste d'action</label>"+
            "<select class='select-option-list moderate-select' name='review-status' id='action-select'>"+

            "<option class='list-title' value='' selected disabled>Sélectionnez l\'action :</option>" +
            "<option class='action-item' name='review-status' value='read'>Lu et à traiter</option>" +
            "<option class='action-item' name='review-status' value='valid'>Valider l'avis</option>" +
            "<option class='action-item' name='review-status' value='delete'>Supprimer l'avis*</option>" +

            "</select>" +
            "<button type='submit' class='button submit-btn display-action-btn' name='submit'>Valider</button>"


        //View scroll to the moderation modal
        moderateInputsContainer.scrollIntoView(true)


    })
}




// fonction de fermeture de la modale :

function hideEditModerationContainer() {
    moderateReviewModal.classList.remove('moderate-review-container-toggle')
}


