<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=passetoncode;charset=utf8;', 'root', '');

if (isset($_POST['valider'])) {
    // Vérifier si l'utilisateur est déjà connecté
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        // Rediriger vers la page d'accueil si déjà connecté
        header("Location: ../index.php");
        exit();
    }

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = $_POST['mdp'];
    $email = htmlspecialchars($_POST['email']);

    // Vérification de la validité du mot de passe
    if (strlen($mdp) < 8 || !preg_match('/[A-Z]/', $mdp) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $mdp)) {
        $error = "Le mot de passe doit avoir un minimum de 8 caractères, avec au moins une majuscule et un caractère spécial";
    } else {
        // Vérifier si l'e-mail existe déjà
        $emailExists = $bdd->prepare('SELECT id FROM users WHERE email = ?');
        $emailExists->execute(array($email));

        // Vérifier le résultat de la requête
        if ($emailExists->rowCount() > 0) {
            // L'e-mail existe déjà, afficher un message d'erreur
            $error = "Cet e-mail est déjà utilisé. Veuillez choisir un autre e-mail.";
        } else {
            $mdp = sha1($mdp);
            $insertUser = $bdd->prepare('INSERT INTO users(pseudo, mdp, email, avatar) VALUES(?, ?, ?, ?)');
            $insertUser->execute(array($pseudo, $mdp, $email, "default.jpg"));

            // Récupérer l'utilisateur inséré
            $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
            $recupUser->execute(array($pseudo, $mdp));

            if ($recupUser->rowCount() > 0) {
                $userData = $recupUser->fetch();
                $_SESSION['pseudo'] = $userData['pseudo'];
                $_SESSION['mdp'] = $userData['mdp'];
                $_SESSION['id'] = $userData['id'];
                header("Location: ../acces/login.php");
                exit();
            } else {
                $error = "Une erreur s'est produite, veuillez réessayer ultérieurement";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Passetoncode|S'inscrire</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../image/panier.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
   <script>
        function togglePassword(inputId, btnId) {
            var passwordInput = document.getElementById(inputId);
            var toggleBtn = document.getElementById(btnId);

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleBtn.innerHTML = "Cacher";
            } else {
                passwordInput.type = "password";
                toggleBtn.innerHTML = "Afficher";
            }
        }
    </script>
        <style>
        body {
            background-image: url('../images/ecranaccueil.jpg');
            background-repeat: no-repeat; /* Assurez-vous que l'image ne se répète pas */
            background-size: cover; /* Étirez l'image pour qu'elle couvre toute la page */
            background-attachment: fixed; /* Fixez l'image en arrière-plan pour qu'elle reste en place lorsque vous faites défiler la page */
        }
    </style>
</head>
<body>
<header>
     <?php include_once ('../header/navbar.php'); ?>
 </header>
    <br>
    <main>
    <form method="post" action="" align="center">
        <h2>S'inscrire</h2>
        <input type="text" name="pseudo" autocomplete="off" placeholder="Identifiant" required>
        <br>
        <input type="email" name="email" autocomplete="off" placeholder="Email" required>
        <br>
        <div class="password-toggle">
            <input type="password" name="mdp" id="mdp" autocomplete="off" placeholder="Mot de passe" required>
            <span class="toggle-btn"><i class="ri-eye-off-line" id="toggle-btn1" onclick="togglePassword('mdp', 'toggle-btn1')"></i></span>
        </div>
        <br/>
        <h6>8 caractères minimum</h6>
        <h6>1 majuscule obligatoire</h6>
        <h6>1 caractère spécial</h6>
        <br>
        <input type="submit" name="valider" value="Valider">
        <a href="login.php">login ?</a> <!-- Lien pour réinitialiser le mot de passe -->
    </form>
    <?php
    // Afficher le message d'erreur s'il existe
    if (isset($error)) {
        echo '<p class="error">' . $error . '</p>';
    }
    ?>
    </main>
</body>
</html>