<?php
//FORM DATA GET and INSERT
require '../const.php';
if (isset($_POST['submit'])) {
    $adminid = uniqid('ad', true);
$getEmployeeName = $_POST['nom'];
echo $getEmployeeName;
$getEmployeeFirstName = $_POST['prenom'];
$getEmployeeEmail = $_POST['email'];
$getEmployeePassword = "";
if ($_POST['password'] === $_POST['password-confirm']) {
$getEmployeePassword = $_POST['password'];
}
try {


        $dbcon = new PDO(DSN);
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbcon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);



$setEmployeeSql = "INSERT INTO administrators(
adminid,
adminname,
adminfirstname,
adminemail,
adminpassword,
adminrole)
VALUES(
:adminid,
:name,
:firstname,
:email,
:password,
'employee'



)";
$setEmployeeStmt = $dbcon->prepare($setEmployeeSql);
$setEmployeeStmt->bindValue('adminid', $adminid);
$setEmployeeStmt->bindValue('name', htmlentities(ucfirst(strtolower($getEmployeeName))));
$setEmployeeStmt->bindValue('firstname', htmlentities(ucfirst(strtolower($getEmployeeFirstName))));
$setEmployeeStmt->bindValue('email', htmlspecialchars(strtolower($getEmployeeEmail)));
$setEmployeeStmt->bindValue('password', htmlentities(password_hash($getEmployeePassword, PASSWORD_DEFAULT)));
$setEmployeeStmt->execute();

echo 'Enregistrement réussi !';
$_POST = null;
header('Location: ../../admin-pages/administrators-home-page.php');
}
catch (PDOException $exception) {
echo 'Erreur : ' . $exception->getMessage();
}
}

