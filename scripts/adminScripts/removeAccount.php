<?php
require '../const.php';

//new connexion :
if (isset($_POST['submit'])) {
    try {
        $dbco = new PDO(DSN);
        $employeeMail = $_POST['empl-email'];
        $rmvSql = "DELETE FROM administrators WHERE adminemail = :emplMail";
        $rmvStmt = $dbco->prepare($rmvSql);
        $rmvStmt->bindValue('emplMail', $employeeMail);
        $rmvStmt->execute();

        echo "<script>alert('Le compte à bien été supprimé.')</script>";
        sleep(2);
        header('Location:../../admin-pages/administrators-home-page.php');
        exit();

    } catch (PDOException $exception) {
        echo 'Une erreur est survenue : ' . $exception->getMessage();
        echo "<script>alert('Une erreur est survenue.')</script>";
        header('Location:../../admin-pages/administrators-home-page.php');
        exit();

    }
}




