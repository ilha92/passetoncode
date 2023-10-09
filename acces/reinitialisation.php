<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=passetoncode;charset=utf8;', 'root', '');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation de mot de passe</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
    <?php include_once ('../header/navbar.php'); ?>
<form method="POST" action="">
<h3>Réinitialisation de mot de passe</h3>
<br>
<form method="POST" action="">
    <label for="email_reset">E-mail :</label>
    <input type="email" name="email" id="email_reset" required>
    <br><br>
    <div class="password-toggle">
    <label for="new_password">Nouveau mot de passe :</label>
    <input type="password" name="new_password" id="mdp" required>
    <span class="toggle-btn"><i class="ri-eye-off-line" id="toggle-btn1" onclick="togglePassword('mdp', 'toggle-btn1')"></i></span>
    </div>
    <br>
    <div class="password-toggle">
    <label for="confirm_password">Confirmer le mot de passe :</label>
    <input type="password" name="confirm_password" id="mdp_confirm" required>
    <span class="toggle-btn"><i class="ri-eye-off-line" id="toggle-btn2" onclick="togglePassword('mdp_confirm', 'toggle-btn2')"></i></span>
    </div>
    <br>
    <input type="submit" name="reset_password" value="Réinitialiser le mot de passe">
</form>
<?php
// Traitement du formulaire de réinitialisation de mot de passe
if(isset($_POST['reset_password'])){
    if(!empty($_POST['email']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])){
        $email = htmlspecialchars($_POST['email']);
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Vérification de la complexité du mot de passe
        $uppercase = preg_match('@[A-Z]@', $new_password);
        $lowercase = preg_match('@[a-z]@', $new_password);
        $number    = preg_match('@[0-9]@', $new_password);
        $specialChars = preg_match('@[^\w]@', $new_password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($new_password) < 8) {
            echo "Le mot de passe doit avoir minimum 8 caractères avec 1 majuscule et 1 caractère spécial.";
        } else {
            // Le mot de passe respecte les critères de complexité exigés
            $new_password = sha1($new_password); // Attention, utiliser un algorithme de hachage sécurisé serait préférable
            
            $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
            $recupUser->execute(array($email));
            if($recupUser->rowCount() > 0){
                $user = $recupUser->fetch();
                if($new_password == sha1($confirm_password)){
                    $updatePassword = $bdd->prepare('UPDATE users SET mdp = ? WHERE email = ?');
                    $updatePassword->execute(array($new_password, $email));
                    echo "Mot de passe réinitialisé avec succès.";
                } else {
                    echo "Les nouveaux mots de passe ne correspondent pas.";
                }
            } else {
                echo "Aucun compte associé à cet e-mail.";
            }
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
 ?>   
 <?php require_once('../footer.php'); ?>
</body>