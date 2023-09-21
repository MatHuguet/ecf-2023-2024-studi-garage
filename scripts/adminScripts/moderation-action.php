<?php

/*
 * L'admin doit sélectionner entre 3 options :
 *      -Marquer comme lu et à traiter
 *      -Lu et validé
 *      -Supprimé
 */

require '../const.php';

if (isset($_POST['submit'])) {

    try {
        $dbco = new PDO(DSN);
        $userReviewEmail = $_POST['review-email'];
        $reviewStatus = $_POST['review-status'];

        //UPDATE REVIEW READ & VALID or DELETE
        //Switch to define which sql to pass

        $reviewEditSql = "UPDATE user_reviews SET reviewIsRead = :adminread, reviewIsValid = :adminvalid 
                    WHERE userEmail = :reviewemail";
        $reviewDeleteSql = "DELETE FROM user_reviews WHERE userEmail = :reviewemail";

        switch ($reviewStatus) {
            case 'read':
                $isRead = 1;
                $isValid = 0;
                $rvwStmt = $dbco->prepare($reviewEditSql);
                $rvwStmt->bindValue('adminread', $isRead);
                $rvwStmt->bindValue('adminvalid', $isValid);
                $rvwStmt->bindValue('reviewemail', $userReviewEmail);
                $rvwStmt->execute();
                break;

            case 'valid':
                $isRead = true;
                $isValid = true;
                $rvwStmt = $dbco->prepare($reviewEditSql);
                $rvwStmt->bindValue('adminread', $isRead);
                $rvwStmt->bindValue('adminvalid', $isValid);
                $rvwStmt->bindValue('reviewemail', $userReviewEmail);
                $rvwStmt->execute();
                break;

            case 'delete':
                $rvwStmt = $dbco->prepare($reviewDeleteSql);
                $rvwStmt->bindValue('reviewemail', $userReviewEmail);
                $rvwStmt->execute();
                break;
        }

        echo "<script>alert('L\'avis à bien été traité.')</script>";

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
