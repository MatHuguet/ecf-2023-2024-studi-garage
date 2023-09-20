<?php
session_start();


if ($_SESSION['user']['Role'] == 'administrator') {
    include_once '../components/admin-components/admin-header.php';
} elseif ($_SESSION['user']['Role'] == 'employee') {
    include_once '../components/admin-components/employee-header.php';
}

?>
<link rel="stylesheet" href="../styles/admin-styles/admin-home.css"/>
<link rel="stylesheet" href="../styles/button.css"/>
<link rel="stylesheet" href="../styles/admin-styles/add-employee.css"/>
<link rel="stylesheet" href="../styles/admin-styles/edit-remove-employee-modal.css"/>

<link rel="stylesheet" href="../styles/admin-styles/adds-management-page.css"/>
<h3 class="admin-select-text">
    Bienvenue sur la page d'administration. Veuillez choisir l'action que vous souhaitez effectuer :
</h3>
<div class="admin-option-container">
    <form method="POST" class="form-action-select">
    <label for="action-select" class="action-selection-list">Liste d'action</label>
    <select name="admin-action" class="select-option-list" id="action-select">
        <?php
            if ($_SESSION['user']['Role'] == 'administrator' || $_SESSION['user']['Role'] == 'employee') {
                echo '
       
                        <option class="list-title" value="" selected disabled>Sélectionnez l\'action :</option>
                        <option class="action-item" name="moderation" value="moderation">Modération des avis</option>
                        <option class="action-item" name="ads" value="ad-management">Gestion des annonces</option>
                ';
            }
            if ($_SESSION['user']['Role'] == 'administrator') {
                echo '
                        <option class="action-item" name="account" value="add-account">Comptes employé-e-s</option>
                        <option class="action-item" name="opening" value="opening-management">Gestion des horaires</option>
                        <option class="action-item" name="services" value="services-management">Services du magasin</option>
                        <option class="action-item" name="password" value="admin-password-update">Modifier mot de passe administrateur</option>
                ';
            }
        ?>
    </select>
        <button type="submit" class="button submit-btn display-action-btn" name="submit">Valider</button>
    </form>

</div>

<?php


// Form action on option selected -> display correct modal

if (isset($_POST['submit'])) {
    $optionValue = $_POST["admin-action"];

    echo '<section class="action-display-container" id = "action-display">';


        include '../components/admin-components/admin-action-modals/' . $optionValue . '.php';


        echo '</section>';
}
$_POST = null;
?>



<!--===========FOOTER========== -->
<!--============================ -->
<!--
<script src="../js/admin-js/admin-action-display.js"></script>
-->
<script src="../js/admin-js/modals/add-employee.js"></script>
<script src="../js/admin-js/modals/remove-edit-employee.js"></script>
<script src="../js/admin-js/modals/moderate-review-modal.js"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="../js/displayBtn.js"></script>
</body>
</html>
