<?php
global $dbco;
require_once './dbinit.php';



    try {
        if (isset($_POST['submit'])) {
            $stmt = $dbco->prepare("INSERT INTO user_reviews(
                         userName, 
                         userFirstName, 
                         userEmail, 
                         reviewNote, 
                         reviewDate, 
                         userVisitDate, 
                         reviewText, 
                         reviewIsValid, 
                         reviewIsRead) 
                VALUES (
                        :username,
                        :userfirstname, 
                        :useremail, 
                        :usernote, 
                        :reviewdate, 
                        :uservisit, 
                        :reviewtext, 
                        :isvalid, 
                        :isread 
                        )");
            $stmt->bindParam('username', $userName);
            $stmt->bindParam('userfirstname', $userFirstName);
            $stmt->bindParam('useremail', $userMail);
            $stmt->bindParam('usernote', $userNote);
            $stmt->bindParam('reviewdate', $reviewDate);
            $stmt->bindParam('uservisit', $userVisit);
            $stmt->bindParam('reviewtext', $reviewText);
            $stmt->bindParam('isvalid', $isValid);
            $stmt->bindParam('isread', $isRead);

            $userName = $_POST['nom'];
            $userFirstName = $_POST['prenom'];
            $userMail = $_POST['email'];
            $userNote = $_POST['note'];
            $reviewDate = date('j/m/Y');
            $userVisit = $_POST['date'];
            $reviewText = $_POST['message'];
            $isValid = false;
            $isRead = false;

            $stmt->execute();
            echo 'Formulaire validé';
        }
    } catch(PDOException $exception) {
        echo 'Erreur :' . $exception->getMessage();

}

