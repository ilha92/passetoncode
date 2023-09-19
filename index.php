<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Bienvenue sur Passetoncode.fr, le meilleur endroit pour endroit pour apprendre reviser et voir les passage de code a coter de chez toi.">
<meta name="keywords" content="Passe ton code est site gratuits pour apprendre le code de la route">
<meta name="author" content="Passetoncode">
<title>Passetoncode - Le meilleurs site pour passe son code</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../images/passetoncode-logo.png">
</head>
<body>
</h1>
 <header>
        <?php include_once 'header/navbar.php'; ?>
        <?php require_once('footer.php'); ?>
 </header>
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
            include_once 'pages/accueil.php';
        }
        ?>
    </main>
</body>
</html>