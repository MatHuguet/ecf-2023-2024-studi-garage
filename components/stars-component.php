<?php
require './scripts/const.php';

//Connect with a new PDO:

try {
    $dbco = new PDO(DSN);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //


} catch (PDOException $exception) {
    echo 'Erreur :' . $exception->getMessage();
};

$rate = 1;
?>
<link rel="stylesheet" href="./styles/stars.css">

    <?php

    //SELECT ALL NOTES, make sum and divide by number of notes to obtain the global note:
    $globalRate = 0;
    $stmt = $dbco->query("SELECT SUM(reviewNote) FROM user_reviews");
    $rateFetch = $stmt->fetch(PDO::FETCH_NUM);
    $rateSum = $rateFetch[0];
    //query for global ratio
    $rateQ = $dbco->query("SELECT reviewNote FROM user_reviews")->fetchAll();
    $rateCount = count($rateQ);
    //Putting rate value in $globalRte variable :
    $globalRate = $rateSum / $rateCount;


        echo "<div class='review-container'>
 

        <div class='stars-ratio-container'>
            <div class='progress' id='progress'></div>
            <img class='stars-img' src='src/images/stars.png' alt='stars ratio'/>
        </div>
            <div class='review-note'>
            <p class='rate' id='rate'>" . round($globalRate, 1) . "</p>
            <p>/5</p>
        </div>

    </div>";


    ?>


<script src="./js/stars-progress.js"></script>

