<?php
require_once '../../scripts/const.php';
require_once '../../scripts/adminConst.php';
//check if values of inputs are Administrator or employees



if (isset($_POST['submit'])) {
    // GET INPUTS VALUES :
//mail: vincent-p@vpgarage.fr
    $getMail = htmlentities($_POST['admin-mail']);
//pass: Enj0liver
    $getPass = htmlentities($_POST['admin-pass']);
    try {
        //New connection :

        $dbco = new PDO('mysql:host=localhost;dbname=garage_parrot_db' , DB_USER, DB_PASS);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbco->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);

        //SELECT, GET and compare values with values in tables:
        //1 : administrator table :
        $query = "SELECT adminPassword FROM administrators WHERE adminEmail = :adminemail";
        $getQ = $dbco->prepare($query);
        $getQ->bindValue('adminemail', $getMail);
        $getQ->execute();
        $getData = $getQ->fetch();
        $adminPass = $getData[0];
        echo "connexion admin table reussie" . "<br>";
        $passCheck = password_verify($getPass, $adminPass);
        if ($passCheck) {
            $query = "SELECT adminName, adminFirstName, adminRole FROM administrators WHERE adminEmail = :adminemail";
            $getQ = $dbco->prepare($query);
            $getQ->bindValue('adminemail', $getMail);
            $getQ->execute();
            $getData = $getQ->fetch();
            $adminName = $getData[0];
            $adminFirstName = $getData[1];
            $adminRole = $getData[2];
            session_start();
            $_SESSION['user'] = [
                'Name' => $adminName,
                'Firstname' => $adminFirstName,
                'Role' => $adminRole
            ];

            header('Location: ../../admin-pages/administrators-home-page.php');
        } else {
            echo "<p class='connection-error-text'>Echec de la connexion</p><br>";
            echo "<p class='connection-error-text'>L'email ou le mot de passe est incorrect</p><br>";
            echo "<p class='return-home'>Retour à <a href='../../index.php'>l'écran d'accueil</a></p>";
        }






    } catch (PDOException $exception) {
        echo 'Erreur : ' . $exception->getMessage();
    }
}