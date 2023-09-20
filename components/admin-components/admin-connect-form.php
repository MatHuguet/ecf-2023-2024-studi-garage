<?php
global $dbco;
require_once './scripts/dbinit.php';
require_once './scripts/adminConst.php';

try {
    //initialisation de la table administrateurs
    $initQ = "CREATE TABLE if not exists administrators(
        adminId VARCHAR(36) NOT NULL,
        adminName VARCHAR(60) NOT NULL,
        adminFirstName VARCHAR(60) NOT NULL,
        adminEmail VARCHAR(60) NOT NULL PRIMARY KEY,
        adminPassword VARCHAR(255) NOT NULL,
        adminRole VARCHAR(25) NOT NULL
)";
    $query = $dbco->query($initQ);
    //insert administrateur général:
    $adminInit = "INSERT IGNORE INTO administrators(adminId, adminName, adminFirstName, adminEmail, adminPassword, adminRole)
                    VALUES(UUID(), :adminname, :adminfirstname, :adminemail, :adminpass, 'administrator')";
    $adminAddQuery = $dbco->prepare($adminInit);
    $adminAddQuery->bindValue(':adminname', ADMIN_NAME);
    $adminAddQuery->bindValue(':adminfirstname', ADMIN_FIRSTNAME);
    $adminAddQuery->bindValue(':adminemail', ADMIN_MAIL);
    $adminAddQuery->bindValue(':adminpass', password_hash(ADMIN_PASS, PASSWORD_DEFAULT));
    $adminAddQuery->execute();

    //Insertion test employé :
    $employeeTestQ = "INSERT IGNORE INTO administrators(
       adminId, 
       adminName, 
       adminFirstName, 
       adminEmail, 
       adminPassword,
       adminRole
       )
        VALUES (
       UUID(),
       :name,
       :firstname,
       'johndoe@example.com',
       :password,
       'employee'
        )";
    $employeeTestAdd = $dbco->prepare($employeeTestQ);
    $employeeTestAdd->bindValue(':name', strtolower('Doe'));
    $employeeTestAdd->bindValue(':firstname', strtolower('John'));
    $employeeTestAdd->bindValue(':password', password_hash('j0hnD0e', PASSWORD_DEFAULT));
    $employeeTestAdd->execute();

} catch (PDOException $exception) {
    echo 'Erreur :' . $exception->getMessage();
}

?>

<!-- ====FORMULAIRE DE CONNEXION ADMINISTRATEURS =============================-->

<div class="connect-form-container">
    <h4 class="top-admin-form-connect">
        Veuillez entrer votre adresse mail et votre mot de passe :
    </h4>

    <!-- FORMULAIRE : -->

    <form method="POST" action="./scripts/adminScripts/adminConnect.php" class="admin-connect-form">
        <!-- Email : -->
        <label
            class="form-label"
            for="input-admin-email">
            Entrez votre email :
        </label>
        <input
            class="form-input"
            type="email"
            id="input-admin-email"
            name="admin-mail"
            value=""
            placeholder="Votre email :"
            required />
        <br>
        <!-- Mot de passe : -->
        <label
            class="form-label"
            for="input-admin-password">
            Entrez votre mot de passe :
        </label>

        <input
            class="form-input"
            type="password"
            id="input-admin-password"
            name="admin-pass"
            value=""
            placeholder="Votre mot de passe :"
            required />

        <!-- Bouton de validation : -->
        <button
            type="submit"
            class="submit-btn admin-connect-submit"
            name="submit">
                Valider
        </button>
    </form>
</div>