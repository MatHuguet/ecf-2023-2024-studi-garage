<?php


try {


    $dbco = new PDO(DSN);
/*
    $dbinit = $dbco->exec("CREATE DATABASE if not exists garage_parrot_db");

    $dbco = new PDO('mysql:host=localhost;dbname=garage_parrot_db' , DB_USER, DB_PASS);
*/
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbco->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);


} catch (PDOException $exception) {
    echo 'ERREUR :' . $exception->getMessage();
}
