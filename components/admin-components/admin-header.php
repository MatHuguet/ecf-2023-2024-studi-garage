<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/admin-styles/admin-header.css"/>
    <link rel="stylesheet" href="../styles/admin-styles/admin-select.css"/>
    <link rel="shortcut icon" href="#" />
    <title>Page Administrateur</title>
</head>
<body>

    <header>
        <div class="admin-header-container">
        <?php
        include_once '../components/admin-components/admin-header-icon.php';
        ?>
            <div class="disconnect">
                <a href="./disconnect.php" class="disconnect-text">déconnexion</a>
            </div>
        </div>
    </header>
