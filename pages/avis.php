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

// Récupérer tous les avis depuis la base de données
$query = "SELECT * FROM avis";
$stmt = $bdd->prepare($query);
$result = $stmt->execute();

// Vérifier si la requête a réussi
if ($result !== false) {
    $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Gérer l'erreur de requête ici
    die("Erreur de requête : " . print_r($stmt->errorInfo(), true));
}

// Traitement du like d'un avis
if (isset($_POST['like']) && isset($_POST['avis_id'])) {
    $avis_id = $_POST['avis_id'];

    // Vérifier si l'utilisateur a déjà liké cet avis
    $query = "SELECT COUNT(*) FROM likes WHERE avis_id = :avis_id AND pseudo = :pseudo";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':avis_id', $avis_id, PDO::PARAM_INT);
    $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $result = $stmt->execute();

    // Vérifier si la requête a réussi
    if ($result !== false) {
        $row = $stmt->fetchColumn();

        if ($row > 0) {
            // L'utilisateur a déjà liké cet avis
            echo "Vous avez déjà liké cet avis.";
        } else {
            // Mettre à jour la base de données pour incrémenter le nombre de likes pour cet avis
            $query = "UPDATE avis SET likes = likes + 1 WHERE id = :id";
            $stmt = $bdd->prepare($query);
            $stmt->bindValue(':id', $avis_id, PDO::PARAM_INT);
            $result = $stmt->execute();

            // Vérifier si la mise à jour a réussi
            if ($result !== false) {
                // Insérer le like de l'utilisateur dans la table "likes"
                $query = "INSERT INTO likes (avis_id, pseudo) VALUES (:avis_id, :pseudo)";
                $stmt = $bdd->prepare($query);
                $stmt->bindValue(':avis_id', $avis_id, PDO::PARAM_INT);
                $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
                $result = $stmt->execute();

                // Vérifier si l'insertion a réussi
                if ($result !== false) {
                    // Rediriger vers la page actuelle pour afficher les changements
                    header("Location: ../pages/avis.php");
                    exit();
                } else {
                    // Gérer l'erreur d'insertion ici
                    die("Erreur d'insertion : " . print_r($stmt->errorInfo(), true));
                }
            } else {
                // Gérer l'erreur de mise à jour ici
                die("Erreur de mise à jour : " . print_r($stmt->errorInfo(), true));
            }
        }
    } else {
        // Gérer l'erreur de requête ici
        die("Erreur de requête : " . print_r($stmt->errorInfo(), true));
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Avis</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../image/panier.ico">
</head>
<body>

<header>
    <?php require_once('../header/navbar.php'); ?>
    <?php require_once('../footer.php'); ?>
</header>
<br>

<!-- Formulaire d'avis -->
<form method="post" action="">
<h2>Donner votre avis :</h2>
<br>
<label for="note">Note :</label>
<input type="number" name="note" id="note" min="1" max="5" required>
<br><br>
<label for="commentaire">Laisser un avis :</label>
<textarea name="commentaire" id="commentaire" rows="5" required></textarea>
<input type="submit" name="submit" value="Soumettre">
</form>
<br>

<?php
// Traitement du formulaire d'avis soumis
if (isset($_POST['submit'])) {
    $note = $_POST['note'];
    $commentaire = $_POST['commentaire'];

    // Insertion de l'avis dans la base de données
    $query = "INSERT INTO avis (pseudo, note, commentaire) VALUES (:pseudo, :note, :commentaire)";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->bindValue(':note', $note, PDO::PARAM_INT);
    $stmt->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);
    $result = $stmt->execute();

    // Vérifier si l'insertion a réussi
    if ($result !== false) {
        $id = $bdd->lastInsertId(); // Récupération de l'ID de l'avis inséré

        // Afficher le message d'avis soumis
        echo '<h2>Avis soumis :</h2>';
        echo '<div class="avis-container">';
        echo '<div class="note">Note : ' . $note . ' <i class="ri-star-line"></i></div>';
        echo '<div class=commentaire>"' . $commentaire . '"</div>';
        echo '<div class="options">';
        echo 'Auteur : ' . $pseudo;
        echo '<a href="avis.php?action=supprimer&id=' . $id . '"><i class="ri-delete-bin-line"></i></a>'; // Utiliser l'ID de l'avis inséré dans le lien de suppression
        echo '</div>';
        echo '</div>';
    } else {
        // Gérer l'erreur d'insertion ici
        die("Erreur d'insertion : " . print_r($stmt->errorInfo(), true));
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id'])) {
    // Traitement de la demande de suppression d'un avis
    $id = $_GET['id'];
    // Suppression de l'avis dans la base de données
    $query = "DELETE FROM avis WHERE id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $result = $stmt->execute();

    // Vérifier si la suppression a réussi
    if ($result !== false) {
        echo 'Avis supprimé avec succès';
    } else {
        // Gérer l'erreur de suppression ici
        die("Erreur de suppression : " . print_r($stmt->errorInfo(), true));
    }
}
?>

<br>
<!-- Affichage des avis -->
<h2>Avis des utilisateurs</h2>
<br><br>
<?php
// Récupérer tous les avis depuis la base de données
$query = "SELECT * FROM avis";
$stmt = $bdd->prepare($query);
$result = $stmt->execute();

// Vérifier si la requête a réussi
if ($result !== false) {
    $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Parcourir les avis et les afficher
    foreach ($avis as $a) {
        echo '<div class="avis-container">';
        echo '<div class="note">Note : ' . $a['note'] . ' étoiles</div>';
        echo '<div class="commentaire">"' . $a['commentaire'] . '"</div>';
        echo '<div class="options">';
        echo 'Auteur : ' . $a['pseudo'];
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="avis_id" value="' . $a['id'] . '">';
        echo '<button type="submit" name="like" ';

        // Vérifier si l'utilisateur a déjà liké cet avis
        $query = "SELECT COUNT(*) FROM likes WHERE avis_id = :avis_id AND pseudo = :pseudo";
        $stmt = $bdd->prepare($query);
        $stmt->bindValue(':avis_id', $a['id'], PDO::PARAM_INT);
        $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $result = $stmt->execute();

        // Vérifier si la requête a réussi
        if ($result !== false) {
            $row = $stmt->fetchColumn();

            if ($row > 0) {
                // L'utilisateur a déjà liké cet avis, désactiver le bouton de like
                echo 'disabled';
            }
        }

        echo '><i class="ri-heart-line"></i></button>';
        echo '<span>' . $a['likes'] . ' likes</span>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
} else {
    // Gérer l'erreur de requête ici
    die("Erreur de requête : " . print_r($stmt->errorInfo(), true));
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>