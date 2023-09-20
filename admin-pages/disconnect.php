<?php

    session_start();
    if (isset($_SESSION)) {
        session_unset();
        session_destroy();
        echo '<p>Déconnexion</p>';
        sleep(1);
        header('Location: ../index.php');
        exit();

}