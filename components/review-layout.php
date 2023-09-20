<?php 
//Import du script de traitement des données avis de la bdd

require './scripts/dbinit.php';


//Connect with a new PDO to the database created above if not exists :

try {
    /*$dbco = new PDO(DSN . ';charset=utf8mb4', DB_USER, DB_PASS);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
    $reviewReq = $dbco->query("SELECT * FROM user_reviews WHERE reviewIsValid = 1");
    $userReviews = $reviewReq->fetchAll(PDO::FETCH_BOTH);
}
catch (PDOException $exception) {
    echo 'Erreur :' . $exception->getMessage();
}





?>

<div class="users-reviews-container">


    <p class="review-top-text">
        Chez Parrot, la satisfaction du client est essentielle ! Et nos clients la partage avec nous :
    </p>
<!-- TODO : INTEGRATE REVIEW STARS COMPONENT-->

        <link rel="stylesheet" href="./styles/stars-display-reviewpage.css">

        <?php

        foreach ($userReviews as $review) {
            echo "<div class='review-container'>
           <div class='review-infos-container'
            <div class='review-user-name'>
                <p class='review-name'>" . ucfirst($review['userFirstName']) . "</p>
                <p class='review-name'>" . ucfirst(substr($review['userName'], 0, 1)) . ". </p>
            </div>

    <div class='review-date'>
            <p>le " . $review['reviewDate'] . "</p>
          </div>
    <div class='review-note'>
            <p class='rate' id='rate'>" . $review['reviewNote'] . "</p>
            <p>/5</p>
        </div>
        <div class='stars-ratio-container'>
            <div class='progress' id='progress'></div>
            <img class='stars-img' src='src/images/stars.png' alt='stars ratio'/>
        </div>
    </div>
    <div class='review-text'>" . "\" " . $review['reviewText'] . " \"" . "</div>
    </div>";
        }

        ?>


        <script src="./js/stars-reviewpage-display.js"></script>
    <div class="give-review-invit">
        <h3 class="give-review-invit-text">
            Envie de partager votre expérience ? ça se passe ici :
        </h3>
        <button class="give-review-btn" onclick="window.location.href='./addreview.php'">Donnez votre avis</button>
    </div>
    </div>
