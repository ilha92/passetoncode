<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tests-de-code-de-la-route-gratuit-en-ligne</title>
    <style>
    .header {
    display: flex; /* Permet aux éléments d'être alignés horizontalement */
    align-items: center; /* Aligne verticalement les éléments sur le centre */
    margin-bottom: 20px; /* Espace entre le titre et le contenu suivant */
}

.header img {
    margin-right: 10px; /* Espace à droite de l'image */
    width: 50px; /* Largeur de l'image */
    height: auto; /* Hauteur automatique pour conserver les proportions */
}
    
.test {
    display: flex; /* Permet aux éléments d'être alignés horizontalement */
    align-items: center; /* Alignement vertical au centre */
    margin-bottom: 20px; /* Espace sous l'élément */
}

.test .content {
    display: flex; /* Alignement horizontal */
    align-items: center; /* Alignement vertical au centre */
}

.test img {
    margin-right: 10px; /* Espace à droite de l'image */
    width: 150px; /* Largeur de l'image (ajustez selon vos besoins) */
    height: auto; /* Hauteur automatique pour conserver les proportions */
}

.text-container {
    border: 1px solid #ccc; /* Une bordure de 1 pixel solide de couleur grise (#ccc) */
    padding: 10px; /* Espace à l'intérieur de la bordure */
    flex: 1; /* Le texte prend tout l'espace restant dans le conteneur */
}
.text-containers {
    border: 1px solid #ccc; /* Une bordure de 1 pixel solide de couleur grise (#ccc) */
    padding: 10px; /* Espace à l'intérieur de la bordure */
    flex: 1; /* Le texte prend tout l'espace restant dans le conteneur */
    background-color: #bd0e0e;
}
    </style>
</head>
<body>
<header>
     <?php require_once('../header/navbar.php'); ?>
</header>
<br><br>
<div class="header">
    <img src="../images/passetoncode-mini.png" alt="">
    <h1>Tests de code de la route</h1>
</div>

    <br>
    <div>
    <h3>Nos tests code de la route</h3>
    <p>Pour avoir accès aux tests en ligne proposés par PASSETONCODE.FR, il faut posséder un compte et être connecté.
 Vous pouvez créer votre compte GRATUITEMENT en cliquant sur le bouton « JE M'INSCRIS » ci-dessous.
 Une fois votre compte créé, vous aurez un accès illimité aux tests de code de la route (séries d'examen et exercices thématiques)
  et vous pourrez suivre votre progression grâce à des statistiques détaillées</p>
 <a href="../index.html" class="btn btn-3d btn-primary btn-lg mr-xs">Testez moi !</a>
<a href="../acces/register.php" class="btn btn-3d btn-secondary btn-lg">Je m'inscris</a>
</div>
<h2>Tests de code de la route gratuit</h2>
<br>
<h4>Apprenez et testez votre code de la route gratuitement :</h4>
<div class="test">
    <div class="content">
        <img src="../images/entrainez-vous-en-ligne-avec-tests-de-code-de-la-route-gratuits-et-illimites (1).jpg" alt="">
        <div class="text-container">
            <p>Passe Ton Code vous apporte l'aide dont vous avez besoin dans votre apprentissage
                 du code de la route en vous offrant un accès gratuit et illimité aux séries d'entraînement (examens et thématiques), 
                 aux cours de code de la route et aux panneaux de signalisation. N'attendez plus, créez votre compte en 2 minutes
                  et commencez à réviser le code de la route !</p>
        </div>
    </div>
    <a class="text-containers" href="../index.html">Lancer un test !</a>
</div>


<br><br>
<?php require_once('../footer.php'); ?>
</body>
</html>