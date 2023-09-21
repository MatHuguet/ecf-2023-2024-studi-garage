<?php
//Init new connection:
require '../scripts/const.php';
try {
    $dbcon = new PDO(DSN);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbcon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    echo 'Erreur de connexion : ' . $exception->getMessage();
}


$getEmployeeSql = "SELECT adminname, adminfirstName, adminemail FROM administrators WHERE adminrole = 'employee'";
$getEmployees = $dbcon->query($getEmployeeSql)->fetchAll();
/*
echo '<pre>';
var_dump($getEmployees);
echo '</pre>';
*/
/*---------DISPLAYING EMPLOYEES ACCOUNT ----------------------------------------------------- */

foreach ($getEmployees as $employeeDatas) {
    $employeeName = $employeeDatas['adminname'];
    $employeeFirstName = $employeeDatas['adminfirstname'];
    $employeeEmail = $employeeDatas['adminemail'];

?>
<!---------------EMPLOYEES INFOS -->

        <div class="employees-container">
            <div class="employees-infos">
                  <div class="employee-name-container">
                      <p class="employee-name"><?php echo ucfirst($employeeName); ?></p>
                      <p class="employee-firstname"><?php echo ucfirst($employeeFirstName) ?></p>
                  </div>
                  <div class="employee-email-container">
                    <p class="employee-email"><?php echo $employeeEmail; ?></p>
                  </div>
            </div>

<!--------------------------- EMPLOYEES ACTION : EDIT OR DELETE ------------------------------------------->

            <div class="account-action">
                    <div class="edit-icon icon"
                         id="edit-account"
                         >
                        <input type="hidden"
                               name="employee-edit"
                               value="<?php echo $employeeEmail ?>"
                               id="input-edit-employee-account">
                        <img src="../src/images/icons/edit.svg"
                             alt="edit delete"
                             width="24px"
                             id="img-edit-btn"
                             data-email="<?php echo $employeeEmail ?>"
                             data-name="<?php echo $employeeName ?>"
                             data-firstname="<?php echo $employeeFirstName ?>"/>
                    </div>


                    <div  class="delete-icon icon"
                          id="delete-account"
                          data-value="<?php echo $employeeEmail ?>">
                           <input type="hidden"
                                  name="employee-delete"
                                  value="<?php echo $employeeEmail ?>"
                                  id="input-delete-employee-account">

                        <img src="../src/images/icons/round-delete.svg"
                             alt="bin delete"
                             width="24px"
                             id="img-delete-btn"
                             data-email="<?php echo $employeeEmail ?>"
                            data-name="<?php echo $employeeName ?>"
                            data-firstname="<?php echo $employeeFirstName ?>"/>
                    </div>

            </div>
        </div>

<?php
    }
/* ------------------------------------------------------------------------------------------*/

?>





<!--Add employee button----------------------------------------------------->



    <div class="add-employee-button" id="add-employee-button">
        <button type="button" class="button-blk add-btn" onclick="displayAddEmployee()">
            <iconify-icon icon="zondicons:add-solid" style="color: white;" width="20"></iconify-icon>
            Ajouter un-e employé-e
        </button>
    </div>



<!-- ADD ACCOUNT MODAL ------------------------------------------------------------>
    <div class="modal-container" id="modal-container">
        <!--<div class="modal-bg" id="modal-bg"></div>-->

            <p class="add-employee-top-text">Entrez les informations de l'employé-e :</p>
            <form class="add-employee-form"
                  method="post"
                  action="../scripts/adminScripts/addEmployeeData.php"
                  id="add-employee-form">
                <label class="form-label" for="input-name">
                    Nom de l'employé-e :
                </label>
                <input class="form-input"
                       type="text"
                       id="input-name"
                       name="nom"
                       value=""
                       placeholder="Nom :"
                       required />

                <label class="form-label" for="input-firstname">Prénom de l'employé-e :</label>
                <input class="form-input"
                       type="text"
                       id="input-firstname"
                       name="prenom"
                       value=""
                       placeholder="Prénom :"
                       required />

                <label class="form-label" for="input-email">Email :</label>
                <input class="form-input"
                       type="email"
                       id="input-email"
                       name="email"
                       value=""
                       placeholder="Email :"
                       required />

                <label class="form-label" for="input-password">Mot de passe :</label>
                <input class="form-input"
                       type="password"
                       id="input-password"
                       name="password"
                       value=""
                       placeholder="Mot de passe :" />

                <label class="form-label" for="input-password-confirm">Veuillez confirmer le mot de passe :</label>
                <input class="form-input"
                       type="password"
                       id="input-password-confirm"
                       name="password-confirm" value=""
                       placeholder="Confirmer le mot de passe :" />

                <!-- Displaying form error -->
                <div class="form-error-container" id="form-error-container"></div>


                <button type="submit" class="submit-btn" name="submit" id="display-btn" disabled>Valider</button>

                <!-- Close modal :-->
                <button type="button" class="cancel-btn" onclick="closeModal()">Annuler/Quitter</button>

            </form>
    </div>

<!------------------------------------------------------------------------------------->
<!--DELETE ACCOUNT MODAL------------>
<div class="delete-account-container" id="delete-account-container">
    <p class="delete-warning">Êtes-vous sûr-e de procéder à la suppression ?</p>
    <form method="post"
          action="../scripts/adminScripts/removeAccount.php"
          onsubmit="alert('Le compte a été supprimé avec succès.')"
          class="delete-account-form">
        <div class="delete-account-infos" id="delete-account-infos"></div>
        <button type="submit" name="submit" class="button delete-btn">Supprimer le compte</button>

    </form>
    <button class="cancel-btn" onclick="hideDeleteAccount()">Annuler</button>
</div>
<!-- ----------------------------------------------------------------------------------->
<!--EDIT ACCOUNT MODAL------------>
<div class="edit-account-container" id="edit-account-container">
    <p class="edit-info">Remplir les champs à modifier :</p>
    <form method="post"
          action="../scripts/adminScripts/editAccount.php"
          onsubmit="alert('Le compte a été modifié avec succès.')"
          class="edit-account-form">
        <div class="edit-input-container" id="edit-input-container"></div>
        <div class="asterisc-container">
            <p class="asterisc">* l'email ne peut être modifié. Pour modifier celui-ci la suppression du compte et la création d'un nouveau sont requise.</p>
            <p class="asterisc">** La modification du mot de passe est obligatoire pour toute autre modification</p>
        </div>
        <button type="submit" name="submit" class="button edit-btn">Appliquer les modifications</button>

    </form>
    <button class="cancel-btn" onclick="hideDeleteAccount()">Annuler</button>
</div>
















