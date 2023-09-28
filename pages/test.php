<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tests-de-code-de-la-route-gratuit-en-ligne</title>
<style>
.header {
    background: url('../images/route.jpeg') no-repeat left center;
    background-size: 100% auto; /* Modifiez cette ligne */
    display: flex;
    align-items: center;
    color: white;
    width: 50%;
    margin: 0;
    padding: 0;
    height: 100px;
}

.image-text {
    flex: 1;
    padding: 0px;
    display: flex;
    align-items: center;
}

.image-text img {
    width: 50px;
    height: auto;
    margin-right: 10px;
}

.image-text h1 {
    font-size: 24px;
    margin: 0;
}
.test {
    background: url('../images/autoroute1.jpg');
    background-size: 750px 283px; /* Dimensions spécifiques de l'image de fond */
    background-repeat: no-repeat;
    position: relative; /* Pour positionner les éléments à l'intérieur de la div */
    text-align: center; /* Pour centrer le texte et les boutons horizontalement */
    color: white; /* Couleur du texte, choisissez celle qui convient à votre image de fond */
    width: 750px; /* Définir la largeur à 750 pixels */
    height: 283px; /* Définir la hauteur à 283 pixels */
    margin: auto;
  text-align: center;
}


.testh2 {
    padding-top: 20px; /* Espacement par rapport au haut de la div */
}

/* Style des boutons */
.btn-rectangular {
    display: inline-block;
    margin: 20px 10px; /* Espacement entre les boutons */
    padding: 10px 20px; /* Marge interne des boutons */
    text-decoration: none;
    color: #fff;
    background-color: #007BFF;
    border: none;
    border-radius: 5px;
    font-size: 18px;
}

/* Style des boutons au survol */
.btn-rectangular:hover {
    background-color: #0056b3;
}

.mySlides {
  display: none;
}

img {
  vertical-align: middle;
}

.slideshow-container {
  position: relative;
  max-width: 700px;
  margin: auto;
  text-align: center;
}

.prev,
.next {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: red;
  font-weight: bold;
  font-size: 30px;
  cursor: pointer;
}

.prev {
  left: 0;
}

.next {
  right: 0;
}
.gratuit{
    padding-top:20px;
    padding-bottom:20px;
    color: white;
    width:900px ;
    left:600px;
    background-color:red;
    margin: auto;
  text-align: center;
}
.apprenez{
    padding-top:20px;
    padding-bottom:20px;
    color: white;
    width:600px ;
    left:300px;
    color:black;
    margin: auto;
  text-align: center;
}
</style>
</head>
<body>
<header>
     <?php require_once('../header/navbar.php'); ?>
</header>
<br><br>
<div class="header">
    <div class="image-text">
        <img src="../images/passetoncode-mini.png" alt="">
        <h1>Tests de code de la route</h1>
    </div>
</div>
<div class="test">
    <h2 class="testh2">Nos tests code de la route</h2>
    <p>Pour avoir accès aux tests en ligne proposés par PASSETONCODE.FR, il faut posséder un compte et être connecté.
        Vous pouvez créer votre compte GRATUITEMENT en cliquant sur le bouton « JE M'INSCRIS » ci-dessous.
        Une fois votre compte créé, vous aurez un accès illimité aux tests de code de la route (séries d'examen et exercices thématiques)
        et vous pourrez suivre votre progression grâce à des statistiques détaillées</p>
    <a href="../index.html" class="btn btn-3d btn-primary btn-lg mr-xs btn-rectangular">Testez moi !</a>
    <a href="../acces/register.php" class="btn btn-3d btn-secondary btn-lg btn-rectangular">Je m'inscris</a>
</div>
<br><br>
<h2 class="gratuit">Tests de code de la route gratuit</h2>
<br>
<h2 class="apprenez">Apprenez et testez votre code de la route gratuitement :</h2>
<div class="slideshow-container">
  <div class="mySlides fade">
    <img src="../images/entrainez-vous-en-ligne-avec-tests-de-code-de-la-route-gratuits-et-illimites (1).jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="../images/panneaux-de-signalisation-routiere.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="../images/progression-examen-code-de-la-route.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="../images/tests-de-code-de-la-route.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="../images/fiche-revision-du-code-de-la-route (1).jpg" style="width:100%">
  </div>


  <!-- Ajoutez autant de diapositives que vous le souhaitez -->

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
    <a class="text-containers" href="../index.html">Lancer un test !</a>
    
    <script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  
  if (n > slides.length) {
    slideIndex = 1;
  }

  if (n < 1) {
    slideIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slides[slideIndex - 1].style.display = "block";
}
</script>
<br><br>
<?php require_once('../footer.php'); ?>
</body>
</html>