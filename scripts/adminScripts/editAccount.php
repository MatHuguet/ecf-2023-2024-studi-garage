<?php
require '../const.php';

//new connexion :
if (isset($_POST['submit'])) {
    try {
        $dbco = new PDO(DSN);
        $employeeEditMail = $_POST['empl-email'];
        //SELECT UUID with email (PK) :
        $getUUID = $dbco->prepare("SELECT adminid FROM administrators WHERE adminemail = :adminEmail");
        $getUUID->bindValue('adminEmail', $employeeEditMail);
        $getUUID->execute();
        $uuidFetch = $getUUID->fetch();
        $uuid = $uuidFetch["adminId"];


        $employeeEditName = ucfirst(strtolower(htmlspecialchars($_POST['empl-name'])));
        $employeeEditFirstname = ucfirst(strtolower(htmlspecialchars($_POST['empl-firstname'])));
        $employeeNewPassword = password_hash($_POST['empl-pass'], PASSWORD_DEFAULT);
        $edtSql = "UPDATE administrators SET adminname = :emplName, adminfirstname = :emplFirstname, adminpassword = :emplPass 
                      WHERE adminId = :uuid";
        $rmvStmt = $dbco->prepare($edtSql);
        $rmvStmt->bindValue('emplName', $employeeEditName);
        $rmvStmt->bindValue('emplFirstname', $employeeEditFirstname);
        $rmvStmt->bindValue('emplPass', $employeeNewPassword);
        $rmvStmt->bindValue('uuid', $uuid);
        $rmvStmt->execute();

        echo "<script>alert('Le compte à bien été modifié.')</script>";
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




