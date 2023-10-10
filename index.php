<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
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
            include_once 'pages/accueil';
        }
        ?>
    </main>
</body>
</html>