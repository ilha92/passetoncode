<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Passe ton code</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/style.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

<link rel="stylesheet"
href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body class="centered">
<header>
    <nav>
        <div class="logo"><header> 
     <h1 style="display: flex; align-items: center;">
                <a href="../index.php">
                    <img src="/images/passetoncode-logo.png" width="192" height="40" style="margin-right: 10px;" alt="Logo Passe-ton-code">
                </a>
        <div class="menu-toggle">
            <img src="../images/menu-btn.png" alt="menu hamburger" class="menu-hamburger">
        </div>
</header>
        </div>
        <ul class="nav-links">
            <li><a href="../pages/accueil.php">Accueil</a></li>
            <li><a href="../pages/test.php">Test</a></li>
            <li><a href="../pages/cours.php">cours</a></li>
            <li><a href="../pages/panneaux.php">Panneaux</a></li>
            <li><a href="../pages/examen.php">Examen</a></li>
            <li><a href="../pages/auto.php">Auto-ecole</a></li>
            <li><a href="../pages/contact.php">Contacter</a></li>
            <li><a href="../pages/compte.php"><i class="ri-user-line"></i>Compte</a></li>
            <li><a href="../pages/avis.php"><i class="ri-pencil-line"></i>Donner son avis</a></li>
            <?php
            // Vérifier si l'utilisateur est connecté
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                echo '<li><a href="../acces/deconnexion.php"><i class="ri-logout-box-r-line"></i>Déconnexion</a></li>';
            } else {
                echo '<li><a href="../acces/login.php"><i class="ri-user-line"></i>Connexion</a></li>';
                echo '<li><a href="../acces/register.php"><i class="ri-user-line"></i>Inscription</a></li>';
            }
            ?>
        </ul>
    </nav>
    </nav>
</header>
<script>
    const menuToggle = document.querySelector(".menu-toggle")
    const navLinks = document.querySelector(".nav-links")

    menuToggle.addEventListener('click',()=>{
        navLinks.classList.toggle('mobile-menu')
    })
</script>
</body>
</html>