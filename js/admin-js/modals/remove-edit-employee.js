const deleteAccount = document.querySelectorAll('#img-delete-btn')
const editAccount = document.querySelectorAll('#img-edit-btn')

/*TODO : loop on deleteAccount and get dataset (value)
-addEventListener 'click' on each to get each data attr
-display delete warning modal with right employee infos
-transfer infos into a form with php inputs values to get in a php script
*/

const deleteAccountContainerModal = document.getElementById('delete-account-container')
const deleteAccountInfos = document.getElementById('delete-account-infos')

const editAccountContainerModal = document.getElementById('edit-account-container')
const editAccountInputsContainer = document.getElementById('edit-input-container')

// LISTEN TO THE CLICK :
document.addEventListener('click', e => {
    //differentiate edit and delete :
    if (e.target.id === 'img-edit-btn') {
        for (let i = 0; i < editAccount.length; i++) {

            editAccount[i].addEventListener('click', e => {
                let employeeMailData = e.target.dataset.email
                let employeeNameData = e.target.dataset.name
                let employeeFirstNameData = e.target.dataset.firstname
                modalContainer.classList.remove('modal-container-toggle')
                deleteAccountContainerModal.classList.remove('delete-account-container-display')
                editAccountContainerModal.classList.add('edit-account-container-display')
                deleteAccountInfos.innerHTML = null

                //Add form with employee informations :

                editAccountInputsContainer.innerHTML =
                    "<label for='empl-name' class='form-label'>Nom : </label>" +
                    "<input type='text' class='edit-input' name='empl-name' id='empl-name' value='" + employeeNameData + "'/>" +
                    "<label for='empl-firstname' class='form-label'>Prénom : </label>" +
                    "<input type='text' class='edit-input' name='empl-firstname' id='empl-firstname' value='" + employeeFirstNameData + "'/>" +
                    "<label for='empl-email' class='form-label'>Email : * </label>" +
                    "<input type='text' class='edit-input' name='empl-email' id='empl-email' value='" + employeeMailData + "' readonly/>"+
                    "<label for='empl-pass' class='form-label'>Nouveau mot de passe : ** " +
                    " </label>" +
                    "<input type='password' class='edit-input' name='empl-pass' id='empl-pass' value='' required/>"

            })

        }

        /*--------- ELSE : DELETE ACCOUNT ACTION ---------------------------------------------------------*/


    } else if (e.target.id === 'img-delete-btn') {

        for (let i = 0; i < deleteAccount.length; i++) {

            deleteAccount[i].addEventListener('click', e => {
                let employeeMailData = e.target.dataset.email
                let employeeNameData = e.target.dataset.name
                let employeeFirstNameData = e.target.dataset.firstname
                modalContainer.classList.remove('modal-container-toggle')
                editAccountContainerModal.classList.remove('delete-account-container-display')
                deleteAccountContainerModal.classList.add('delete-account-container-display')
                editAccountInputsContainer.innerHTML = null
                //Add form with employee informations :

                deleteAccountInfos.innerHTML =
                    "<label for='empl-name' class='form-label'>Nom : " + employeeNameData + "</label>" +
                    "<input type='hidden' class='disabled-input' name='empl-name' id='empl-name' value='" + employeeNameData + "'>" +
                    "<label for='empl-firstname' class='form-label'>Prénom : " + employeeFirstNameData + "</label>" +
                    "<input type='hidden' class='disabled-input' name='empl-firstname' id='empl-firstname' value='" + employeeFirstNameData + "'>" +
                    "<label for='empl-email' class='form-label'>Email : " + employeeMailData + "</label>" +
                    "<input type='hidden' class='disabled-input' name='empl-email' id='empl-email' value='" + employeeMailData + "'>"

            })

        }


    }









})




// CLOSE DELETE ACCOUNT MODAL
function hideDeleteAccount() {
    deleteAccountContainerModal.classList.remove('delete-account-container-display')
    editAccountContainerModal.classList.remove('edit-account-container-display')

}





