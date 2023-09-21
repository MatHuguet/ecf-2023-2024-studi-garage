<?php
require './scripts/const.php';
$visitDateFormat = date('Y-m-d');
//=================if button submit is pressed : ===============================
if (isset($_POST['submit'])) {

//==============================================================================

//=================Check if article title already exists : =====================

    if (!empty($_POST)) {
        $userName = $_POST['nom'];
        $userFirstName = $_POST['prenom'];
        $userEmail = $_POST['email'];
        $reviewDate = date("d-m-Y");
        $visitDate = $_POST['date'];
        $note = $_POST['note'];
        $reviewText = $_POST['message'];
        $isRead = 0;
        $isValid = 0;

        try {

            //new connexion :
            require './scripts/dbinit.php';


            //initialize reviews table :

            $dbco->exec("CREATE TABLE if not exists user_reviews(
                            reviewId INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
                            userName VARCHAR(60) NOT NULL,
                            userFirstName VARCHAR(60) NOT NULL,
                            userEmail VARCHAR(60) NOT NULL,
                            reviewNote SMALLINT(1) NOT NULL,
                            reviewDate VARCHAR(60) NOT NULL,
                            userVisitDate VARCHAR(60) NOT NULL,
                            reviewText TEXT(500) NOT NULL,
                            reviewIsValid BOOLEAN NOT NULL,
                            reviewIsRead BOOLEAN NOT NULL 
                             )");

            $sql = "INSERT INTO user_reviews(
                        userName, 
                        userFirstName,
                        userEmail,
                        reviewNote,
                        reviewDate,
                        userVisitDate,
                        reviewText,
                        reviewIsValid,
                        reviewIsRead
                    
                         ) 
                    VALUES (
                            :username, 
                            :userfirstname, 
                            :useremail, 
                            :reviewnote,
                            :reviewdate,
                            :uservisit,
                            :reviewtext,
                            :isvalid,
                            :isread
                            )";
            $add = $dbco->prepare($sql);
            $add->bindValue(':username', $userName, PDO::PARAM_STR);
            $add->bindValue(':userfirstname', $userFirstName, PDO::PARAM_STR);
            $add->bindValue(':useremail', $userEmail, PDO::PARAM_STR);
            $add->bindValue(':reviewnote', $note, PDO::PARAM_INT);
            $add->bindValue(':reviewdate', $reviewDate, PDO::PARAM_STR);
            $add->bindValue(':uservisit', $visitDate, PDO::PARAM_STR);
            $add->bindValue(':reviewtext', $reviewText, PDO::PARAM_STR);
            $add->bindValue(':isvalid', $isValid);
            $add->bindValue(':isread', $isRead);
            $add->execute();



        } catch (PDOException $e) {
            echo "Erreur :" . $e->getMessage() . "<br>";
        }
    }
}

?>

<div class="contact-form-container">
    <p class="contact-top-text">
        Votre avis est primordial pour notre équipe ! N’hésitez pas à le partager.
    </p>
    <form method="POST" id="contact-form">
        <label class="form-label" for="input-name">
            Entrez votre nom :
        </label>
        <input class="form-input" type="text" id="input-name" name="nom" value="" placeholder="Votre nom :" required />
        <br>

        <label class="form-label" for="input-firstname">Entrez votre prénom :</label>
        <input class="form-input" type="text" id="input-firstname" name="prenom" value="" placeholder="Votre prénom :"
               required />
        <br>

        <label class="form-label" for="input-email">Entrez votre email :</label>
        <input class="form-input" type="email" id="input-email" name="email" value="" placeholder="Votre email :"
               required />
        <br>

        <label class="form-label" for="input-visit-date">Date de visite de l'atelier :</label>
        <input class="form-input" type="date" id="input-visit-date" name="date" min="2000-05-24" max="<?php echo $visitDateFormat ?>" value="" placeholder="Date de visite de l'atelier :"
               required />
        <br>
        <!-- ===============================================================================================-->
<!-- STARS-->
        <p class="star-select-text">Sélectionnez le nombre d'étoiles que vous souhaitez nous attribuer :</p>
        <div class="stars-select-container">
            <div class="stars">
                <ul class="star-list">
                    <li class="star-item" id="star-item" data-rate="5" value="5"></li>
                    <li class="star-item" id="star-item" data-rate="4" value="4"></li>
                    <li class="star-item" id="star-item" data-rate="3" value="3"></li>
                    <li class="star-item" id="star-item" data-rate="2" value="2"></li>
                    <li class="star-item active" id="star-item" data-rate="1" value="1"></li>
                </ul>

            </div>
        </div>
        <div class="star-count">
            <label for="star-count" class="user-note">Votre note :</label>
            <input class="star-count-text" id="star-count" name="note" readonly/><h4 class="ratio-text">/5</h4>
        </div>

        <!-- ===============================================================================================-->

        <label class="form-label" for="input-message">Commentaire</label>
        <textarea form="contact-form" class="form-message-area" id="input-message" name="message"
                  placeholder="Votre commentaire ici :" maxlength="500" required></textarea>

        <input type="checkbox" id="contact-cgu">
        <label class="form-label" for="contact-cgu">J'accepte les conditions générales</label>

        <button type="submit" class="submit-btn" name="submit">Valider</button>




    </form>
    <script src="./js/stars-notation-display.js"></script>
</div>



