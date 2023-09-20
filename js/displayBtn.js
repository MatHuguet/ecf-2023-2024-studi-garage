//TO DO :
//verify if values entered by admin or else respects regex
//verify if all fields are filled AND valid

// IF ALL IS OK : enable submit button


// enable button after all fields filled
//Select Form :
const form = document.getElementById('add-employee-form')
/*
//Select all inputs
const inputName = document.getElementById('input-name')
const inputFirstName = document.getElementById('input-firstname')
const inputEmail = document.getElementById('input-email')
const inputPassword = document.getElementById('input-password')
const inputPasswordConfirm = document.getElementById('input-password-confirm')
*/
//Select submit button :
const submitBtn = document.getElementById('display-btn')
//Select error container :
const errorContainer = document.getElementById('form-error-container')

//test : select all input at once :
const inputElelements = document.getElementsByClassName('form-input')
//errors data
const errorMessages = []

//Boolean to determine if each inputs respects securities values
let nameInput = false
let firstNameInput = false
let emailInput = false
let password = false
let passwordConfirm = false
let isPasswordChecked = false




let specCharsPattern = /[,|;\\ |'|"|\/]|-{2,}/

for (i = 0; i < inputElelements.length; i++) {

    inputElelements[i].addEventListener("input", e => {
        let targetName = e.target.name
        let targetValue = e.target.value


        //NAME INPUT CHECK:
        if (targetName === 'nom') {

            if (!specCharsPattern.test(targetValue)) {
                console.log('ok')
                errorMessages.splice(0, errorMessages.length)
                e.target.classList.remove('input-error')
                e.target.style.color = 'black'
                nameInput = true
            } else if (specCharsPattern.test(targetValue)) {
                console.log('not ok')
                nameInput = false
                errorMessages.push('Le champ "nom" ne peut contenir les caractères ,;/\'\"')
                e.target.classList.add('input-error')
                e.target.style.color = 'red'


            } else {
                errorMessages.splice(0, errorMessages.length)
                e.target.classList.remove('input-error')
                e.target.style.color = 'black'
            }
            //TODO : remplacer valeur identique dans array pour éviter itération du message d'erreur
            //TODO : voir comment colorer border red lorsque focus


        }

        //FIRSTNAME INPUT CHECK :
        if (targetName === 'prenom') {
            if (!specCharsPattern.test(targetValue)) {
                console.log('ok')
                errorMessages.splice(0, errorMessages.length)
                e.target.classList.remove('input-error')
                e.target.style.color = 'black'
                firstNameInput = true
            } else if (specCharsPattern.test(targetValue)) {
                console.log('not ok')

                errorMessages.push('Le champ "prénom" ne peut contenir les caractères ,;/\'\"')
                e.target.classList.add('input-error')
                e.target.style.color = 'red'
                firstNameInput = false


            } else {
                errorMessages.splice(0, errorMessages.length)
                e.target.classList.remove('input-error')
                e.target.style.color = 'black'
            }
            //TODO : remplacer valeur identique dans array pour éviter itération du message d'erreur
            //TODO : voir comment colorer border red lorsque focus
        }

        //EMAIL INPUT CHECK :

        if (targetName === 'email') {
            if (!specCharsPattern.test(targetValue)) {
                console.log('ok')
                errorMessages.splice(0, errorMessages.length)
                e.target.classList.remove('input-error')
                e.target.style.color = 'black'
                emailInput = true
            } else if (targetValue.length <= 5) {
                console.log('not ok')

                errorMessages.push('Le champ "email" ne peut contenir moins de 5 caractères')
                e.target.classList.add('input-error')
                e.target.style.color = 'red'
                emailInput = false


            } else if (specCharsPattern.test(targetValue)) {
                console.log('not ok')

                errorMessages.push('Le champ "email" ne peut contenir les caractères ,;/\'\"')
                e.target.classList.add('input-error')
                e.target.style.color = 'red'
                emailInput = false


            } else {
                errorMessages.splice(0, errorMessages.length)
                e.target.classList.remove('input-error')
                e.target.style.color = 'black'
            }
            //TODO : remplacer valeur identique dans array pour éviter itération du message d'erreur
            //TODO : voir comment colorer border red lorsque focus
        }


let passValue
        //PASSWORD CHECK :
        //check if field is filled
        //check for lazy password (password, 1234, admin)
        //check for not allowed specials characters (regex : /, \, ', ")
        if (targetName === 'password') {
            passValue = e.target.value
            if (!specCharsPattern.test(targetValue)) {
                console.log('ok')
                errorMessages.splice(0, errorMessages.length)
                e.target.classList.remove('input-error')
                e.target.style.color = 'black'
                password = true
                let passValue = e.target.value
            } else if (targetValue.length <= 8) {
                console.log('not ok')

                errorMessages.push('Le mot de passe doit contenir au moins 8 caractères')
                e.target.classList.add('input-error')
                e.target.style.color = 'red'
                password = false


            } else if (specCharsPattern.test(targetValue)) {
                console.log('not ok')

                errorMessages.push('Le champ "email" ne peut contenir les caractères ,;/\'\"')
                e.target.classList.add('input-error')
                e.target.style.color = 'red'
                password = false


            } else {
                errorMessages.splice(0, errorMessages.length)
                e.target.classList.remove('input-error')
                e.target.style.color = 'black'
            }
            //TODO : remplacer valeur identique dans array pour éviter itération du message d'erreur
            //TODO : voir comment colorer border red lorsque focus
        }

        let passValueConfirm
        //CONFIRM PASSWORD CHERCK:
        //check if field is filled
        //check if the passwordConfirm === password
        if (targetName === 'password-confirm') {
            //TODO : test passwords match in conditions
            if (!specCharsPattern.test(targetValue)) {
                passValueConfirm = e.target.value
                console.log('ok')
                errorMessages.splice(0, errorMessages.length)
                e.target.classList.remove('input-error')
                e.target.style.color = 'black'
                passwordConfirm = true
            } else if (targetValue.length <= 8) {
                console.log('not ok')

                errorMessages.push('Le mot de passe doit contenir au moins 8 caractères')
                e.target.classList.add('input-error')
                e.target.style.color = 'red'
                passwordConfirm = false


            } else if (specCharsPattern.test(targetValue)) {
                console.log('not ok')

                errorMessages.push('Le champ "mot de passe" ne peut contenir les caractères ,;/\'\"')
                e.target.classList.add('input-error')
                e.target.style.color = 'red'
                passwordConfirm = false


            } else {
                errorMessages.splice(0, errorMessages.length)
                e.target.classList.remove('input-error')
                e.target.style.color = 'black'
            }
            //TODO : remplacer valeur identique dans array pour éviter itération du message d'erreur
            //TODO : voir comment colorer border red lorsque focus
        }

            isPasswordChecked = true

        //if everything ok : isPasswordChecked = true
        console.log(nameInput, firstNameInput, emailInput)
        console.log(isPasswordChecked)

        if (nameInput && firstNameInput && emailInput && isPasswordChecked) {

            submitBtn.disabled = false
        } else {
            submitBtn.disabled = true
        }
        console.log(errorMessages)
        errorContainer.innerText = errorMessages.join(', ')
    })




}




/*
inputName.addEventListener("input", e => {
    e.target.value == null
    console.log('name: ' + e.target.value.length)
    if (e.target.value.length < 1 || e.target.value == null || e.target.value === "") {
        console.log('empty field')
    }
    if (e.target.value.length > 0) {
        submitBtn.disabled = false
    } else {
        submitBtn.disabled = true
    }
})
*/
/*

 DISPLAY DELETE ACCOUNT MODAL
const deleteIconDisplay = document.getElementById('delete-account')
const deleteAccountContainerModal = document.getElementById('delete-account-container')
function displayDeleteAccount() {
    deleteAccountContainerModal.classList.add('delete-account-container-display')
}
function hideDeleteAccount() {
    deleteAccountContainerModal.classList.remove('delete-account-container-display')
}

*/