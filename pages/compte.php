<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=passetoncode;charset=utf8;', 'root', '');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Rediriger vers la page de login si l'utilisateur n'est pas connecté
    header("Location: ../acces/login.php");
    exit();
}
// Récupérer les informations de l'utilisateur connecté
if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];

    // Récupérer les informations de l'email connecté
    if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
        $email = $_SESSION['email'];

        // Récupérer les informations de l'utilisateur depuis la base de données
        $query = $bdd->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $query->execute(array('pseudo' => $pseudo));
        $usersinfo = $query->fetch();

         // Récupérer les informations de l'email depuis la base de données
         $query = $bdd->prepare('SELECT * FROM email WHERE email = :email');
         $query->execute(array('email' => $email));
         $emailinfo = $query->fetch();
    } else {
        // Rediriger vers la page de login si les informations de l'utilisateur ne sont pas disponibles
        header("Location: ../acces/login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Passetoncode</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../image/panier.ico">
</head>
<body>
<header>
     <?php require_once('../header/navbar.php'); ?>
</header>
<br><br>
<?php
if(!empty($usersinfo['avatar']))
{
?>
<form method="post" action="" enctype="multipart/form-data">
<h4>Bienvenue sur votre compte, <?php echo $pseudo; ?> !</h4>
<br>
<div class="avatar-container">
    <img src="../acces/users/avatars/<?php echo $usersinfo['avatar'] ?>" alt="Avatar">
    <label for="avatar" class="upload-button"><i class="ri-file-edit-line"></i></label>
    <input type="file" name="avatar" id="avatar">
</div>
    <br>
<?php
}
?>
<!-- Afficher les informations de l'utilisateur -->
<form method="post" action="" enctype="multipart/form-data">
<p>Identifiant : <?php echo $pseudo; ?><a href="../pages/profile.php"><i class="ri-pencil-line"></i></a>
<br><br>
<!-- Ajouter d'autres informations de l'utilisateur ici -->
<p>email : <?php echo $email; ?></p>
<!-- Ajouter un lien de déconnexion -->
<br>
<form method="post" action="" enctype="multipart/form-data">
    <input type="submit" value="Mettre à jour mon image">
    <br><br>
    <input type="submit" name="deconnexion" value="Déconnexion">
    
    <?php 
    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
    {
        $taillemax = 2097152;
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
        if($_FILES['avatar']['size'] <= $taillemax )
        {
            $extensionsUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
            if(in_array($extensionsUpload, $extensionsValides))
            {
                $chemin = "../acces/users/avatars/".$_SESSION['id'].".".$extensionsUpload;
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                if($resultat)
                {
                    $updateavatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                    $updateavatar->execute(array('avatar' => $_SESSION['id'].".".$extensionsUpload,'id' => $_SESSION['id']));
                }
                else{
                    echo "Erreur durant l'importation de votre profil";
                }
            }
            else
            {
                echo "Extension de fichier non valide jpg, jpeg, gif, png";
            }
        }
        else
        {
            echo "Fichier trop volumineux";
        }
    }
    ?>
</form>
    <?php
    // Traitement du formulaire de déconnexion
    if(isset($_POST['deconnexion'])){
        // Détruire toutes les variables de session et rediriger vers la page de login
        session_unset();
        session_destroy();
        header("Location: ../acces/login.php");
        exit();
    }
    ?>
</body>
</html>