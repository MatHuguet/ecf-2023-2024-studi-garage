<?php
require '../scripts/const.php';
$_POST = null;
try {

    //connection
    $dbcon = new PDO(DSN);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbcon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);
    //get datas
    $getReviewsSql = "SELECT reviewid, username, userfirstname, useremail, reviewnote, reviewdate, reviewtext, reviewisvalid, reviewisread FROM user_reviews";
    $getReviews = $dbcon->query($getReviewsSql)->fetchAll();

?>
<link rel="stylesheet" href="../styles/admin-styles/admin-moderation.css"/>
<table>
    <tr>
        <th>Nom</th>
        <th>Date</th>
        <th>Note</th>
        <th>Consulter</th>
    </tr>

    <?php
    foreach ($getReviews as $review) {
        $reviewUserName = $review['userName'];
        $reviewUserFirstName = $review['userFirstName'];
        $userEmail = $review['userEmail'];
        $reviewNote = $review['reviewNote'];
        $isRead = $review['reviewIsRead'];
        $isValid = $review['reviewIsValid'];
        $reviewText = $review['reviewText'];
        $userVisitDate = $review['userVisitDate'];
        $reviewDate = $review['reviewDate'];
        $reviewId = $review['reviewId'];

        //calcul du timestamp pour afficher les review à traiter en retard :
        $dateFormat = 'd-m-Y';
        $today = new DateTime("now");
        $today->format($dateFormat);
        try {
            $getReviewDate = new DateTime($reviewDate);
        }
        catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }

        $reviewDate_Diff_str = $today->diff($getReviewDate)->format("%a");
        $reviewDate_Diff = intval($reviewDate_Diff_str);


        ?>

        <tr class="<?php
        if ($isValid) {
            echo 'validReview';
        } elseif ($reviewDate_Diff >= 5) {
            echo 'warningReview';
        } elseif (!$isRead) {
            echo 'newReview';
        }
        ?>">
            <td><?php echo $reviewUserName . '.' . ucfirst(substr($reviewUserFirstName, 0, 1))?></td>
            <td><?php echo $reviewDate ?></td>
            <td><?php echo $reviewNote . '/5'?></td>
            <td><img src="../src/images/icons/eye.svg"
                     class="icon eye-icon"
                     alt="view review"
                     width="24px"
                     id="img-moderate-btn"
                     data-email="<?php echo $userEmail ?>"
                     data-name="<?php echo $reviewUserName ?>"
                     data-firstname="<?php echo $reviewUserFirstName ?>"
                     data-text="<?php echo $reviewText ?>"
                     data-reviewdate="<?php echo $reviewDate ?>"
                     data-visitdate="<?php echo $userVisitDate ?>"
                     data-reviewid="<?php echo $reviewId ?>"
                     data-reviewnote="<?php echo $reviewNote ?>"


                />
            </td>
        </tr>


        <?php
    }
    ?>
</table>

<div class="moderate-review-container" id="moderate-review-container">
    <p class="admin-select-text moderation-text">Veuillez sélectionner l'action à effectuer dans le menu déroulant :</p>
    <form method="post"
          action="../scripts/adminScripts/moderation-action.php"
          onsubmit="alert('Le status de l\'avis à été modifié avec succès')"
          class="edit-account-form">
        <div class="moderate-inputs-container" id="moderate-inputs-container"></div>
    </form>
    <p class='review-text-delete'>* En cas de suppression, merci d'en avertir le client sur la raison.</p>
    <button class="cancel-moderate-btn" onclick="hideEditModerationContainer()">Annuler</button>

</div>

<?php
} catch (PDOException $exception) {
    echo 'Erreur de connexion : ' . $exception->getMessage();
}





