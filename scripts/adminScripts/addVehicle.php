<?php

    try {
        require '../const.php';

        //new connection :
        $dbco = new PDO(DSN, DB_USER, DB_PASS);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST['submit'])) {
            /*
            echo '<pre>';
            var_dump($_POST);
            echo '</pre>';
            */


            $vehicleBrand = htmlspecialchars(htmlentities($_POST['brand'], ENT_QUOTES));
            $addDate = date('d-m-Y');
            $vehicleModel = htmlspecialchars(htmlentities($_POST['vehicle-model'], ENT_QUOTES));
            $vehicleKilometers = htmlspecialchars(htmlentities($_POST['vehicle-kilometers'], ENT_QUOTES));
            $vehicleMotor = htmlspecialchars(htmlentities($_POST['motor'], ENT_SUBSTITUTE));
            $vehicleRelease = htmlspecialchars($_POST['vehicle-release'], ENT_SUBSTITUTE);
            $vehiclePrice = htmlspecialchars(htmlentities($_POST['vehicle-price'], ENT_QUOTES));
            $vehicleColor = htmlspecialchars(htmlentities($_POST['vehicle-color'], ENT_QUOTES));
            $vehicleText = htmlspecialchars(htmlentities($_POST['vehicle-text'], ENT_SUBSTITUTE));

            /*
* SQL : Il faut insérer les valeurs de 2 manières différentes:
* ---dans vehicles :
* On stock l'annonce et les données relatives à $_POST + un identifiant UUID
* ---dans vehiclesimages :
* On stock les URLs des images + un ID d'image UUID + l'ID de référence de l'annonce en Primary Key
*
* --Inclure le même UUID dans les deux tables :
* */
            //On cré l' UUID :
            $addUUID = uniqid('add_', true);

            //Insertion dans la base de données des annonces:
            $addSql = "INSERT INTO vehicles(
                     addID, 
                     addDate, 
                     brand, 
                     modelName, 
                     vehicleColor, 
                     motorType, 
                     vehicleReleaseDate, 
                     kilometers, 
                     vehicleDescription, 
                     vehiclePrice) 
                    VALUES(
                           :addId,
                           :addDate,
                           :addBrand,
                           :model,
                           :color,
                           :motor,
                           :releaseDate,
                           :kilometers,
                           :description,
                           :price
                    )";
            $addsStmt = $dbco->prepare($addSql);
            $addsStmt->bindValue('addId', $addUUID);
            $addsStmt->bindValue('addDate', $addDate);
            $addsStmt->bindValue('addBrand', $vehicleBrand);
            $addsStmt->bindValue('model', $vehicleModel);
            $addsStmt->bindValue('color', $vehicleColor);
            $addsStmt->bindValue('motor', $vehicleMotor);
            $addsStmt->bindValue('releaseDate', $vehicleRelease);
            $addsStmt->bindValue('kilometers', $vehicleKilometers, PDO::PARAM_INT);
            $addsStmt->bindValue('description', $vehicleText);
            $addsStmt->bindValue('price', $vehiclePrice, PDO::PARAM_INT);
            $addsStmt->execute();



            define("FILE_UPLOAD", '../../upload_files/');

            if (isset($_FILES)) {
                /*
                echo '<pre>';
                var_dump($_FILES);
                echo '</pre>';
                */

                $imgName1 = '';
                $imgName2 = '';
                $imgName3 = '';
                $imgName4 = '';
                $imgName5 = '';

                // 1st image
                if (isset($_FILES['dl-img'])) {
                    $img1Id = uniqid('img', true);
                    $imgTmpName1 = $_FILES['dl-img']['tmp_name'];
                    $imgSize1 = $_FILES['dl-img']['size'] / 1000000;
                    $imgName1 = strtolower(str_replace(' ', '_', $_FILES['dl-img']['name']));
                    move_uploaded_file($imgTmpName1, FILE_UPLOAD . $imgName1);

                    //insertion image1:
                    if ($imgName1) {


                    $addImgSql = "INSERT INTO vehiclesimages(
                           imgId, 
                           addID, 
                           imgUrl)
                                   VALUES(
                                          :imgid,
                                          :addID,
                                          :url
                                   )";

                    $addImgStmt = $dbco->prepare($addImgSql);
                    $addImgStmt->bindValue('imgid', $img1Id);
                    $addImgStmt->bindValue('addID', $addUUID);
                    $addImgStmt->bindValue('url', $imgName1);
                    $addImgStmt->execute();
                    }
                }

                //2nd image
                if (isset($_FILES['dl-img2'])) {
                    $img2Id = uniqid('img', true);
                    $imgTmpName2 = $_FILES['dl-img2']['tmp_name'];
                    $imgSize2 = $_FILES['dl-img2']['size'] / 1000000;
                    $imgName2 = strtolower(str_replace(' ', '_', $_FILES['dl-img2']['name']));
                    move_uploaded_file($imgTmpName2, FILE_UPLOAD . $imgName2);

                    //insertion image2:
                    if ($imgName2) {
                        $addImgSql = "INSERT INTO vehiclesimages(
                           imgId, 
                           addID, 
                           imgUrl)
                                   VALUES(
                                          :imgid,
                                          :addID,
                                          :url
                                   )";

                        $addImgStmt = $dbco->prepare($addImgSql);
                        $addImgStmt->bindValue('imgid', $img2Id);
                        $addImgStmt->bindValue('addID', $addUUID);
                        $addImgStmt->bindValue('url', $imgName2);
                        $addImgStmt->execute();
                    }
                }

                //3rd image
                if (isset($_FILES['dl-img3'])) {
                    $img3Id = uniqid('img', true);
                    $imgTmpName3 = $_FILES['dl-img3']['tmp_name'];
                    $imgSize3 = $_FILES['dl-img3']['size'] / 1000000;
                    $imgName3 = strtolower(str_replace(' ', '_', $_FILES['dl-img3']['name']));
                    move_uploaded_file($imgTmpName3, FILE_UPLOAD . $imgName3);

                    //insertion image3:
                    if ($imgName3) {
                        $addImgSql = "INSERT INTO vehiclesimages(
                           imgId, 
                           addID, 
                           imgUrl)
                                   VALUES(
                                          :imgid,
                                          :addID,
                                          :url
                                   )";

                        $addImgStmt = $dbco->prepare($addImgSql);
                        $addImgStmt->bindValue('imgid', $img3Id);
                        $addImgStmt->bindValue('addID', $addUUID);
                        $addImgStmt->bindValue('url', $imgName3);
                        $addImgStmt->execute();
                    }
                }

                //4th image
                if (isset($_FILES['dl-img4'])) {
                    $img4Id = uniqid('img', true);
                    $imgTmpName4 = $_FILES['dl-img4']['tmp_name'];
                    $imgSize4 = $_FILES['dl-img4']['size'] / 1000000;
                    $imgName4 = strtolower(str_replace(' ', '_', $_FILES['dl-img4']['name']));
                    move_uploaded_file($imgTmpName4, FILE_UPLOAD . $imgName4);

                    //insertion image4:
                    if ($imgName4) {
                        $addImgSql = "INSERT INTO vehiclesimages(
                           imgId, 
                           addID, 
                           imgUrl)
                                   VALUES(
                                          :imgid,
                                          :addID,
                                          :url
                                   )";

                        $addImgStmt = $dbco->prepare($addImgSql);
                        $addImgStmt->bindValue('imgid', $img4Id);
                        $addImgStmt->bindValue('addID', $addUUID);
                        $addImgStmt->bindValue('url', $imgName4);
                        $addImgStmt->execute();
                    }

                }

                //5th image
                if (isset($_FILES['dl-img5'])) {
                    $img5Id = uniqid('img', true);
                    $imgTmpName5 = $_FILES['dl-img5']['tmp_name'];
                    $imgSize5 = $_FILES['dl-img5']['size'] / 1000000;
                    $imgName5 = strtolower(str_replace(' ', '_', $_FILES['dl-img5']['name']));
                    move_uploaded_file($imgTmpName5, FILE_UPLOAD . $imgName5);

                    //insertion image5:
                    if ($imgName5) {
                        $addImgSql = "INSERT INTO vehiclesimages(
                           imgId, 
                           addID, 
                           imgUrl)
                                   VALUES(
                                          :imgid,
                                          :addID,
                                          :url
                                   )";

                        $addImgStmt = $dbco->prepare($addImgSql);
                        $addImgStmt->bindValue('imgid', $img5Id);
                        $addImgStmt->bindValue('addID', $addUUID);
                        $addImgStmt->bindValue('url', $imgName5);
                        $addImgStmt->execute();
                    }
                }
                /*
                        echo $imgName1;
                        echo $imgName2;
                        echo $imgName3;
                        echo $imgName4;
                        echo $imgName5;
                */






            }



        echo 'Annonce créée avec succès!';
            echo "<script>alert('Annonce correctement enregistrée')</script>";
            sleep(1);
            header('Location: ../../admin-pages/administrators-home-page.php');

        }
    } catch (PDOException $exception) {
        echo 'Erreur : ' . $exception->getMessage();
    }







