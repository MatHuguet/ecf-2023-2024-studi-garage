//modal container :
const addsModalContainer = document.getElementById('adds-modal-container')

const addVehicleModal = document.getElementById('add-vehicle')
const editVehicleModal = document.getElementById('edit-vehicle')

//function display adds add modal on click :
function displayAddsAdd() {
    editVehicleModal.classList.remove('edit-vehicle-toggle')
    addVehicleModal.classList.add('add-vehicle-toggle')
    addsModalContainer.scrollIntoView(true)

}

function hideAddsAdd() {
    addVehicleModal.classList.remove('add-vehicle-toggle')
}

//const inputImgDl = document.getElementById('vehicle-image')
const inputImgDl = document.querySelectorAll('' +
    '#vehicle-image')

for (const inputImgDlElement of inputImgDl) {
    inputImgDlElement.addEventListener('change', e => {
        let fileSize = e.target.files[0].size / 1000000

        let path = e.target.files[0].name;
        let strSpaceReplace = path.replaceAll(/ /g, '_')
        let pathFilter = strSpaceReplace.replaceAll(/\./g, " ")
        let pathSplit = pathFilter.split(" ")
        let file = pathSplit[pathSplit.length - 1]
        console.log(file)
        console.log(fileSize)

    })
}


//Tri des formats -- TODO later

//inputImgDl.addEventListener('change',
//    e => {
    //Controls on type and size of the downloaded file

        /* get file size : */
//        let fileSize = e.target.files[0].size / 1000000

        /* get file extension : */
        //1- get file name
//        let path = e.target.files[0].name;
        //-2 replace space by underscores
//        let strSpaceReplace = path.replaceAll(/ /g, '_')
        //3- replace the dot before the extension by a space
//        let pathFilter = strSpaceReplace.replaceAll(/\./g, " ")
        //4 - with the space separating file name and extension, we split the two strings and put them in an array
//        let pathSplit = pathFilter.split(" ")
        //5- we get the last value in the array
//        let file = pathSplit[pathSplit.length - 1]
//        console.log(file)
//        console.log(fileSize)
//    })






