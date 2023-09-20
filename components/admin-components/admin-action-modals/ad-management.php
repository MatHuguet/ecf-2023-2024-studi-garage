<?php

require '../scripts/const.php';
$maxDateFormat = date('Y-m');
/*------display actual adds----------------*/
//new connection:
try {
    $dbco = new PDO(DSN, DB_USER, DB_PASS);
    //CREATE table adds if not exists :

    $carsSql = "CREATE TABLE if not exists vehicles(
         addID VARCHAR(255) NOT NULL PRIMARY KEY,
         addDate VARCHAR(12) NOT NULL, 
         brand VARCHAR(25) NOT NULL,
         modelName VARCHAR(25) NOT NULL,
         vehicleColor VARCHAR(25),
         motorType VARCHAR(25) NOT NULL,
         vehicleReleaseDate VARCHAR(12) NOT NULL,
         kilometers INT(8) NOT NULL,
         vehicleDescription TEXT(500) NOT NULL,
         vehiclePrice INT(60) NOT NULL 
)";
    $dbco->exec($carsSql);

    //CREATE table images for adds :
    $carsImgSql = "CREATE TABLE if not exists vehiclesImages(
        imgId VARCHAR(255) NOT NULL PRIMARY KEY,
        addID VARCHAR(255) NOT NULL,
        imgUrl VARCHAR(255) NOT NULL,
        FOREIGN KEY (addID) REFERENCES vehicles(addID)
        
)";
    $dbco->exec($carsImgSql);

/*
    //test:
    $sqlTest = "INSERT INTO vehicles(addID, addDate, brand, modelName, vehicleColor, motorType, vehicleReleaseDate, kilometers, vehicleDescription, vehiclePrice) 
    VALUES (UUID(), :date, 'Peugeot', '306', 'red', 'essence', '03/2020', 95300, 'jolie voiture', 6400 )";
    $stmt = $dbco->prepare($sqlTest);
    $stmt->bindValue('date', date('d-m-Y'));
    $stmt->execute();
*/

    //SELECT adds :
    $getAddsSql = "SELECT * FROM vehicles";
    $carFetched = $dbco->query($getAddsSql);
    $getAdds = $carFetched->fetchAll();


    //Start of table before foreach() :
?>
    <div class="adds-container" id="adds-container">
    <p class="add-employee-top-text">Sélectionnez l'annonce à modifier ou créez en une nouvelle</p>


    <?php
    //get infos in variables and display adds :

    foreach ($getAdds as $add) {
        $brand = $add['brand'];
        $modelName = $add['modelName'];
        $motor = $add['motorType'];
        $vehicleColor = $add['vehicleColor'];
        $vehicleRelease = $add['vehicleReleaseDate'];
        $vehicleKilometers = $add['kilometers'];
        $addDescription = $add['vehicleDescription'];
        $vehiclePrice = $add['vehiclePrice'];
        $addDate = $add['addDate'];
        $addId = $add['addID'];

        ?>
<!----pass values through the table------------- -->
        <table class="add-table">

            <tr class="adds-table-head">
                <th class="adds-table-titles" colspan="2">vehicule</th>
                <th class="adds-table-titles">mise en ligne</th>
                <th class="adds-table-titles">consulter</th>
            </tr>
        <tr class="adds-table-row">
            <td class="adds-table-items"><?php echo $brand ?></td>
            <td class="adds-table-items"><?php echo $modelName ?></td>
            <td class="adds-table-items" rowspan="3"><?php echo $addDate  ?></td>
            <td class="adds-table-items" rowspan="3">
                <img class="edit-icon" src="../src/images/icons/edit.svg"
                     alt="edit"/>
            </td>
        </tr>
        <tr class="adds-table-row">
            <td class="adds-table-items"><?php echo $vehicleRelease ?></td>
            <td class="adds-table-items"><?php echo $vehicleColor ?></td>

        </tr>
        <tr class="adds-table-row">
            <td class="adds-table-items"><?php echo $vehicleKilometers ?></td>
            <td class="adds-table-items"><?php echo $vehiclePrice ?></td>
        </tr>






<!-- ---------------------------------------------->
                <?php

                }



                } catch (PDOException $exception) {
                    echo 'Erreur de connexion :' . $exception->getMessage();
                }

                ?>

            </table>
        </div>
<div class="adds-add-button" id="adds-add-button">
    <button type="button" class="button-blk add-btn" onclick="displayAddsAdd()">
        <iconify-icon icon="zondicons:add-solid" style="color: white;" width="20"></iconify-icon>
        Ajouter une annonce
    </button>
</div>

<div class="adds-modal-container" id="adds-modal-container">
    <!-- ADD VEHICLE -->
    <div class="add-vehicle" id="add-vehicle">
        <p class="adds-add-infos">Veuillez entrer les informations sur le véhicule :</p>
        <form action="../scripts/adminScripts/addVehicle.php" method="post" class="add-vehicle-form"
              enctype="multipart/form-data">

            <label class="adds-form-label" for="vehicle-brand">Marque du véhicule :
                <select class="add-adds-input" id="vehicle-brand" name="brand">
                    <option value="renault" selected>Renault</option>
                    <option value="peugeot">Peugeot</option>
                    <option value="citroën">Citroën</option>
                    <option value="dacia">Dacia</option>
                    <option value="volkswagen">Volkswagen</option>
                    <option value="opel">Opel</option>
                    <option value="toyota">Toyota</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                    <option value="bmw">BMW</option>
                    <option value="hyundai">Hyundai</option>
                </select>

            </label>

            <label class="adds-form-label" for="vehicle-model">Modèle du véhicule :</label>
            <input type="text" class="add-adds-input" id="vehicle-model" name="vehicle-model" value=""
                   placeholder="Modèle" required/>


            <label class="adds-form-label" for="vehicle-color">Couleur du véhicule :</label>
            <select class="add-adds-input" id="vehicle-color" name="vehicle-color" required>
                <option value="metal" selected>Métalisée</option>
                <option value="blanche">Blanche</option>
                <option value="noire">Noire</option>
                <option value="anthracite">Anthracite</option>
                <option value="bleue">Bleue</option>
                <option value="bleu nuit">Bleu nuit</option>
                <option value="jaune">Jaune</option>
                <option value="rouge">Rouge</option>
                <option value="orange">Orange</option>
                <option value="verte">Verte</option>
                <option value="vert-fonce">Vert foncé</option>
                <option value="null">Non définie</option>
            </select>

            <label class="adds-form-label" for="vehicle-kilometers">Nombre de kilomètres :</label>
            <input type="number" class="add-adds-input" id="vehicle-kilometers" name="vehicle-kilometers" value=""
                   placeholder="Kilomètres" required/>

            <label class="adds-form-label" for="vehicle-release">Date de mise en circulation :</label>
            <input class="add-adds-input" type="month" id="vehicle-release" name="vehicle-release" value=""
                   max="<?php echo $maxDateFormat ?>" required/>

            <label class="adds-form-label" for="vehicle-motor">Type de moteur :</label>
            <select class="motor-select add-adds-input" id="vehicle-motor" name="motor" required>
                <option value="essence" selected>Essence</option>
                <option value="diesel">Diesel</option>
                <option value="hybride">Hybride</option>
                <option value="electrique">Electrique</option>
            </select>

            <label class="adds-form-label" for="vehicle-price">Prix :</label>
            <input class="add-adds-input" type="number" id="vehicle-price" name="vehicle-price" value=""
                   placeholder="Prix" required/>

            <label class=" adds-form-label" for="vehicle-text">Ajouter une description brève :</label>
            <!--<input class="add-adds-input adds-form-text" type="text" id="vehicle-text" name="vehicle-text" value=""
                   placeholder="Description" minlength="25" maxlength="500"/>-->
            <textarea class="add-adds-input adds-form-text" id="vehicle-text" name="vehicle-text"
                      placeholder="Description" minlength="25" maxlength="150"></textarea>


            <!----------IMAGE DOWNLOAD -->

            <p class="adds-add-img-text">Télécharger des images : (max 5)</p>
            <label class="adds-img-form-label" for="vehicle-image">Télécharger image 1</label>
            <input type="file" class="img-file-input" name="dl-img" id="vehicle-image" accept="image/jpeg, image/png"
                           value=""/>

            <label class="adds-img-form-label" for="vehicle-image">Télécharger image 2</label>
            <input type="file" class="img-file-input" name="dl-img2" id="vehicle-image" accept="image/jpeg,
            image/png"
                           value=""/>

            <label class="adds-img-form-label" for="vehicle-image">Télécharger image 3</label>
            <input type="file" class="img-file-input" name="dl-img3" id="vehicle-image" accept="image/jpeg, image/png"
                           value=""/>

            <label class="adds-img-form-label" for="vehicle-image">Télécharger image 4</label>
            <input type="file" class="img-file-input" name="dl-img4" id="vehicle-image" accept="image/jpeg, image/png"
                           value=""/>

            <label class="adds-img-form-label" for="vehicle-image">Télécharger image 5</label>
            <input type="file" class="img-file-input" name="dl-img5" id="vehicle-image" accept="image/jpeg, image/png"
                           value=""/>





            <button type="submit" name="submit" class="button submit-btn add-vehicle-sub">Ajouter le véhicule</button>
        </form>
        <button class="cancel-btn add-vehicle-cancel-btn" onclick="hideAddsAdd()">Annuler</button>
    </div>





    <!-- ------------------------------------------------------->







    <!-- EDIT VEHICLE-------------->
    <div class="edit-vehicle" id="edit-vehicle">
        <form action="../scripts/adminScripts/editVehicle.php" method="post" class="add-vehicle-form">
            <div class="inputs-add-container" id="inputs-add-container"></div>
            <button type="submit" name="submit" class="button edit-btn">Appliquer les modifications</button>
        </form>
        <button class="cancel-btn" onclick="hideDeleteAccount()">Annuler</button>
    </div>
    <!-- ------------------------------------------------------->

</div>



<script src="../js/admin-js/modals/adds-edit-add.js"></script>





