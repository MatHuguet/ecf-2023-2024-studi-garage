<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/index-page-content.css">
    <link rel="stylesheet" href="./styles/services.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/button.css">

    <title>Garage Vincent Parrot - Services</title>
</head>

<body>

    <?php
require_once './components/header.php';

require_once './components/services-section.php';
?>
    <!-- =======================================================================-->
    <section class="services-section1">
        <div class="services-section1-container">
            <div class="services-section-text">
                <p class="services-text white-text">
                    Au garage automobile Parrot, nous réparons votre véhicule peut importe la marque et le modèle.
                </p>
                <p class="services-text white-text">
                    Prenez simplement rendez-vous avec nous. Nous examinerons votre véhicule et vous recevrez un devis
                    détaillé. Avec votre accord, nous prendrons alors rapidement votre véhicule en charge.
                </p>
            </div>
            <div class="services-section1-img">
                <img src="./src/images/kate-ibragimova-bEGTsOCnHro-unsplash.jpg" />
            </div>
        </div>
        <button class="contact-btn">prendre rendez-vous</button>
    </section>
    <!-- =======================================================================-->
    <section class="services-section2">
        <div class="services-section2-container">
            <div class="services-section1-img">
                <img src="./src/images/thisisengineering-raeng-aL2rxQhEfAM-unsplash.jpg" />
            </div>
            <div class="services-section-text">
                <p class="services-text ">
                    Besoin d’une révision ? d’un entretien ? L’équipe du garage Parrot est à votre disposition pour
                    toutes vos demandes de visites technique.
                </p>
                <p class="services-text">
                    Nous procédons à une analyse complète de votre véhicule afin de fournir le meilleur service possible
                    et le meilleur entretien pour votre voiture.
                </p>
            </div>
        </div>
    </section>
    <!--================================================================-->
    <section class="services-section3">
        <div class="services-section3-container">
            <div class="services-section-text">
                <p class="services-text white-text">
                    Besoin de remplacer un ou plusieurs pneus ? Envie d’anticiper vos trajets et de vérifier et/ou
                    adapter vos pneus en conséquences ?
                </p>
                <p class="services-text white-text">
                    Prenez vite rendez-vous avec nous. Le garage Parrot se fera un plaisir de vous aider !
                </p>
            </div>
            <div class="services-section1-img">
                <img src="./src/images/tekton-O_ufcLVTAYw-unsplash (1).jpg" />
            </div>
        </div>
        <button class="contact-btn">prendre rendez-vous</button>
    </section>
    <!--=================================================================-->
    <section class="services-section4">
        <div class="bg-image2"></div>
        <div class="services-section4-container">
            <div class="services-section-text">
                <p class="services-text services-vehicules white-text">
                    Venez également découvrir nos véhicules d’occasions révisés, réparés et entretenus par nos soins et
                    au
                    meilleur prix, pour un confort et une satisfaction garantie !
                </p>
            </div>
            <button class="vehicule-btn" onclick="window.location.href='#'">découvrir nos véhicules</button>
        </div>
    </section>
    <section class="services-section5">
        <div class="services-section5-container">
            <div class="services-section-text">
                <h3 class="services-section5-title">Une urgence ? une panne ?</h3>
                <p class="services-text services-vehicules">
                    Contactez-nous par téléphone afin que nous puissions trouver ensemble une solution à votre problème,
                    du dépannage à domicile au remorquage de votre véhicule. *
                </p>
                <p class="services-text services-vehicules asterisc">
                    *sous réserve de disponibilité.<br>
                    Remorquage et dépannage à domicile dans un rayon de 50km autour du garage, sous réserve de
                    disponibilité de nos véhicules de dépannage.
                </p>
            </div>
            <button class="contact-btn" onclick="window.location.href='#'">contactez-nous !</button>
        </div>
    </section>
    <?php

require_once './components/footer.php';