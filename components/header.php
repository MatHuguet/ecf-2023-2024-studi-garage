<?php
?>
<!-- Affichage du Header en fonction de l'utilisateur
Si ADMIN connecté, affichage du header admin
-->
<header>
    <div class="bg-image"></div>
    <?php
        require "navbar.php";
    ?>

    <div class="welcome-msg">
        <img class="logo-title" src="./src/images/logo-title.png" alt="logo-title"/>
        <p class="title-desc">qualité - professionnalisme - satisfaction</p>
        <p class="welcome">Bienvenue dans notre garage</p>
    </div>

</header>

