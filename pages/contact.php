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
} else {
    // Rediriger vers la page de login si les informations de l'utilisateur ne sont pas disponibles
    header("Location: ../acces/login.php");
    exit();
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer les données soumises dans le formulaire
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insertion des données dans la table "contacts"
    $query = "INSERT INTO contacts (pseudo, email, message) VALUES (:pseudo, :email, :message)";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':message', $message, PDO::PARAM_STR);
    $result = $stmt->execute();

    // Vérifier si l'insertion a réussi
    if ($result !== false) {
        echo "Message envoyé avec succès !";
    } else {
        // Gérer l'erreur d'insertion ici
        die("Erreur d'insertion : " . print_r($stmt->errorInfo(), true));
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cestino Pizza - Contact</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../image/panier.ico">
</head>
<body>
<header>
     <h1 style="display: flex; align-items: center;">
     <img src="../image/pizza/panier.png" width="80" height="60" alt="Logo Pizza Shop" style="margin-right: 10px;">Cestino Pizza</h1>
     <?php include_once '../header/navbar.php'; ?>
        <?php require_once('../footer.php'); ?>
</header>
    <main>
        <form action="" method="post">
             <h1>Nous contacter</h1>
        <br>
        <form action="" method="post">
             <p>Vous pouvez nous contacter via les coordonnées suivantes :</p>
        <ul>
            <br><br>
            <p><i class="ri-mail-line"></i>Email : iliashamel041@gmail.com</p>
            <br>
            <p><i class="ri-phone-line"></i>Téléphone : +33 123 456 789</p>
            <br>
            <p><i class="ri-map-pin-line"></i>Adresse: 12 rue, 75001 Paris</p>
        </ul>
        <br>
        <p>Ou en utilisant le formulaire de contact ci-dessous :</p>
        <br>
        <form action="" method="post">
            <label for="pseudo">Nom :</label>
            <input type="text" id="pseudo" name="pseudo" required>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            <input type="submit" name="submit" value="Envoyer">
        </form>
    </main>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>