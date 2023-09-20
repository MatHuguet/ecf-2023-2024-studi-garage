<?php
echo 'hello';
require './scripts/const.php';

try {
    $dbcon = new PDO(DSN);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Select adds






} catch (PDOException $exception) {
    echo 'Erreur de connexion : ' . $exception->getMessage();
}

$getAddsIdSql = "SELECT * FROM vehicles";
$getAddsIdStmt = $dbcon->query($getAddsIdSql)->fetchAll(PDO::FETCH_ASSOC);
/*
echo '<pre>';
var_dump($getAddsIdStmt);
echo '</pre>';
*/
foreach ($getAddsIdStmt as $addItemId) {

    $addiD = $addItemId['addID'];
    $addDate = $addItemId['addDate'];
    $addBrand = $addItemId['brand'];
    $model = $addItemId['modelName'];
    $color = $addItemId['vehicleColor'];
    $motor = $addItemId['motorType'];
    $release = $addItemId['vehicleReleaseDate'];
    $kilometers = $addItemId['kilometers'];
    $description = html_entity_decode($addItemId['vehicleDescription']);
    $price = $addItemId['vehiclePrice'];

    ?>

    <div class="add-container" id="add-container">
        <div class="add-images">
            <img src="">
        </div>
        <div class="infos-banner">
            <div class="release-date">
                <img src="" alt="calendrier">
                <p><?php echo $release ?></p>
            </div>
            <div class="kilometers">
                <img src="" alt="cadran">
                <p><?php echo $kilometers ?></p>
            </div>
            <div class="motor-type">
                <img src="" alt="voiture">
                <p><?php echo $motor ?></p>
            </div>
        </div>
        <div class="vehicle-main-title">
            <h4>Véhicule <?php echo $addBrand . ' ' . $model ?></h4>
        </div>
        <div class="vehicle-description-container">
            <p class="vehicle-description"></p>
        </div>
        <div class="vehicle-contact"></div>
    </div>



<?php
    /*
    $getAddSql = "SELECT * FROM vehicles WHERE addID = $addItemId";
    $getAdd = $dbcon->query($getAddSql)->fetchAll();
    var_dump($getAdd);
    */
}