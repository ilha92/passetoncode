<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <title>Passetoncode| Login</title>
    <style>
        body {
            background-image: url('../images/ecranaccueil.jpg');
            background-repeat: no-repeat; /* Assurez-vous que l'image ne se répète pas */
            background-size: cover; /* Étirez l'image pour qu'elle couvre toute la page */
            background-attachment: fixed; /* Fixez l'image en arrière-plan pour qu'elle reste en place lorsque vous faites défiler la page */
        }
    </style>
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
</head>

<body>
    <header>
        <?php require_once('../header/navbar.php'); ?>
    </header>
     <br>
     <form method="POST" action="">
    <h1>Connexion</h1>
    <br>
    <form method="POST" action="">
        <label for="pseudo">Identifiant :</label>
        <input type="text" name="pseudo" id="pseudo" required>
        <br>
        <label for="email">E-mail :</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <div class="password-toggle">
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" required>
        <span class="toggle-btn"><i class="ri-eye-off-line" id="toggle-btn1" onclick="togglePassword('mdp', 'toggle-btn1')"></i></span>
        </div>
        <br>
        <input type="submit" name="connexion" value="Se connecter">
        <br> 
        <div class="two">
                <label><a href="reinitialisation.php">Forgot password?</a></label>
                <label ><a href="register.php">register ?</a></label> <!-- Lien pour réinitialiser le mot de passe -->
            </div>
        
    </form>
<?php 
$bdd = new PDO('mysql:host=localhost;dbname=passetoncode;charset=utf8;', 'root', '');

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // Rediriger vers la page d'accueil si déjà connecté
    header("Location: ../index.php");
    exit();
}

// Traitement du formulaire de connexion
if(isset($_POST['connexion'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']) && !empty($_POST['email'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = sha1($_POST['mdp']); // Attention, utiliser un algorithme de hachage sécurisé serait préférable

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND email = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $email, $mdp));
        if($recupUser->rowCount() > 0){
            $user = $recupUser->fetch();
            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['mdp'] = $user['mdp'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['logged_in'] = true; // Définir une variable de session pour indiquer que l'utilisateur est connecté
            // Rediriger vers la page d'accueil ou une autre page appropriée
            header("Location: ../index.php");
            exit();
        } else {
            echo "Pseudo, e-mail ou mot de passe incorrect.";
        }
    } else { 
        echo "Veuillez remplir tous les champs...";
    }
}

// Traitement du formulaire de déconnexion
if(isset($_POST['deconnexion'])){
    // Détruire toutes les variables de session et rediriger vers la page de connexion
    session_unset();
    session_destroy();
    exit();
}

// Traitement du formulaire de réinitialisation de mot de passe
if(isset($_POST['reset_password'])){
    if(!empty($_POST['email']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])){
        $email = htmlspecialchars($_POST['email']);
        $new_password = sha1($_POST['new_password']); // Attention, utiliser un algorithme de hachage sécurisé serait préférable
        $confirm_password = sha1($_POST['confirm_password']); // Attention, utiliser un algorithme de hachage sécurisé serait préférable

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $recupUser->execute(array($email));
        if($recupUser->rowCount() > 0){
            $user = $recupUser->fetch();
            if($new_password == $confirm_password){
                $updatePassword = $bdd->prepare('UPDATE users SET mdp = ? WHERE email = ?');
                $updatePassword->execute(array($new_password, $email));
                echo "Mot de passe réinitialisé avec succès.";
            } else {
                echo "Les nouveaux mots de passe ne correspondent pas.";
            }
        } else {
            echo "Aucun compte associé à cet e-mail.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>
</body>
</html>