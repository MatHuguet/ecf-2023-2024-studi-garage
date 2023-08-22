<?php 
//Import du script de traitement des données avis de la bdd
$userFirstname = 'Mathieu';
$userFLetterName = 'H';
$reviewDate = '22/08/2023';
?>

<div class="review-container">
    <p class="text">
        Chez Parrot, la satisfaction du client est essentielle ! Et nos clients la partage avec nous :
    </p>
    <section class="reviews">
        <div class='review-block-container'>
            <div class="review-infos">
                <h2 class="review-name">
                    <?php echo $userFirstname . ' ' . $userFLetterName . '.'; ?>
                </h2>
                <p class="review-date">
                    <?php echo 'le ' . $reviewDate?>
                </p>
            </div>
        </div>

    </section>
</div>