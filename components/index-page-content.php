<?php
require_once './components/services-section.php';
?>
<section class="index-section1">
    <div class="index-section1-container">
        <div class="section1-text">
            <p class="text section1-text">
                Découvrez notre expertise automobile à votre service à Toulouse. L’équipe du garage Parrot met tout en
                œuvre pour l’entretien de votre véhicule afin de vous garantir une entière satisfaction à chaque sortie
                de notre atelier.
            </p>
            <!--<div class="services-btn"><a href="#">découvrir nos services</a></div> -->
            <button class="services-btn" onclick="window.location.href='./services.php'">découvrir nos services</button>
        </div>
        <img class="img-index-section1" src="./src/images/benjamin-brunner-K3cjUOMmMhc-unsplash.jpg" alt="mechanicien">
    </div>
</section>
<section class="index-section2-review">
    <div class="section2-review-container">
        <p class="text section2-text">
            Nos clients parlent de nous !
            Découvrez leurs commentaires ou donnez le votre !
        </p>

        <!-- INCLUDE STARS-COMPONENTS-->

        <?php
            include_once './components/stars-component.php';
        ?>


        <!-- ===================================================-->

        <button class="review-btn" onclick="window.location.href='./review.php'">découvrir les avis clients</button>
    </div>
</section>
<section class="index-section3-location">
    <div class="section3-location-container">
        <div class="map">
            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="https://www.google.com/maps/d/embed?mid=1UloWZEIlSy98BExsovAAaIbxudAilo0&ehbc=2E312F&noprof=1"></iframe>
        </div>
        <p class="text location-text">
            Retrouvez le garage automobile Parrot Toulouse à la Croix Dorade. Le site est ouvert tous les jours de la
            semaine, du lundi au vendredi (consultez les horaires en bas de page).
        </p>
        <p class="text location-text">
            Avec ou sans rendez-vous, nous vous accueillons avec le sourire pour répondre à vos interrogations ou vous
            montrer nos véhicules d’occasion.
        </p>
    </div>
    <?php 
        require './components/buttons/contact-btn.php';
    ?>
</section>