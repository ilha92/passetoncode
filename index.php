<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passetoncode - Le meilleur site pour passer son code</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="icon" type="image/x-icon" href="images/passetoncode-logo.png">
    <style>
        body {
            background-image: url('images/ecranaccueil.jpg');
            background-repeat: no-repeat; /* Assurez-vous que l'image ne se répète pas */
            background-size: cover; /* Étirez l'image pour qu'elle couvre toute la page */
            background-attachment: fixed; /* Fixez l'image en arrière-plan pour qu'elle reste en place lorsque vous faites défiler la page */
        }
    </style>
</head>
<body>
    <?php include_once('header/navbar.php'); ?>
    <main>
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'accueil':
                    include_once 'pages/accueil.php';
                    break;
                case 'test':
                    include_once 'pages/test.php';
                    break;
                case 'cours':
                    include_once 'pages/cours.php';
                    break;
                case 'panneaux':
                    include_once 'pages/panneaux.php';
                    break;
                case 'examen':
                    include_once 'pages/examen.php';
                    break;
                case 'auto':
                    include_once 'pages/auto.php';
                    break;
                case 'avis':
                    include_once 'pages/avis.php';
                    break;
                default:
                    include_once 'pages/accueil.php';
                    break;
            }
        } else {
            include_once '/pages/accueil.php';
        }
        ?>
    </main>
</body>
</html>