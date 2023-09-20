const modalContainer = document.getElementById('modal-container')
const addEmployeeModalDisplay = document.getElementById('add-employee-modal')
function displayAddEmployee() {
    modalContainer.classList.add('modal-container-toggle')
}

function closeModal() {
    modalContainer.classList.remove('modal-container-toggle')
}