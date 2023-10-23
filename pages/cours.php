<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Passetoncode|cours</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
    <?php require_once('../header/navbar.php'); ?>
    <br>
    <section class="cours">
        <h1>Cours de code de la route</h1>
        <!-- Liste déroulante pour choisir une catégorie -->
        <label for="categorie">Choisir une catégorie :</label>
        <select id="categorie">
            <option value="alcool">L'Alcool</option>
            <option value="feuxdeposition">Utilisation des feux</option>
            <option value="vitesse">Vitesse</option>
            <!-- Ajoutez d'autres catégories ici -->
        </select>
        <!-- Catégorie "alcool" -->
        <div class="panneaux-categorie" id="alcool">
            <!-- Panneau 1 -->
            <div class="alcool">
            <h2 class="testh2">L'alcool</h2>
    <p>L'alcoolémie représente le taux d'alcool présent dans le sang. Elle se mesure généralement en gramme par litre de sang ou en milligramme par litre d'air expiré.
<br>
En moyenne un verre représente 0,20 gramme par litre de sang soit 0,10 mg/l d'air expiré.</p>
<img src="../images/alcool-1.jpg" alt="alcool">
<br>
<h2>Les effets de l'alcool sur la conduite</h2>
<br>
<li>Diminution du champ de vision</li>
<li>Diminution l'attention, de la concentration, des réflexes</li>
<li>Altération de la perception des vitesses et des distances</li>
<li>Augmentation de la sensibilité à l'éblouissement</li>
<li>Augmentation du temps de réaction</li>
<p>De plus, les effets euphorisants liés à la consommation d'alcool diminuent la perception du danger : le conducteur a tendance à prendre plus de risques.
<br>
En moyenne, les effets de l'alcool se font sentir dès 0,30 g/l de sang.</p>
<br>
<h2>Alcool au Volant</h2>
<br>
<p>Pour conduire, mon taux d'alcoolémie doit être inférieur à 0,50 g/l de sang (soit 0,25 mg/l d'air expiré) ce qui correspond à deux verres en moyenne.</p>
<br>
<h2>Dépassement du seuil autorisé</h2>
<br>
En conduisant avec un taux d'alcoolémie compris entre 0,50 g/l et 0,80 g/l de sang, je commets une infraction, je risque une amende forfaitaire de 135 euros ainsi que la perte de 6 points sur mon permis de conduire.

En conduisant avec un taux d'alcoolémie supérieur à 0,80 g/l de sang, je commets un délit, je risque jusqu'à 2 ans d'emprisonnement, 4500 euros d'amende, la suspension de mon permis (pour une durée pouvant aller jusqu'à 3 ans) ainsi que la perte de 6 points sur mon permis de conduire.
<br>
<h3>Correspondances</h3>
<li>0,20 g/l de sang  =  0,10 mg/l d'air expiré</li>
<li>0,30 g/l de sang  =  0,15 mg/l d'air expiré</li>
<li>0,50 g/l de sang  =  0,25 mg/l d'air expiré</li>
<li>0,80 g/l de sang  =  0,40 mg/l d'air expiré</li>
            </div>
        </div>
        <!-- Catégorie "feuxdeposition" -->
        <div class="panneaux-categorie" id="feuxdeposition">
            <!-- feux1 -->
            <div class="feuxdeposition">
             <img src="../images/feuxpos-position-ic.jpg"> <h2 class="testh2">Feux de position</h2>
             <img src="../images/feuxpos-position.jpg" alt="">
              <p>Utilisation de nuit : en agglomération uniquement, lorsque l'éclairage permet au conducteur de voir à une distance suffisante.
Utilisation de jour : en agglomération uniquement, par temps de pluie, brouillard ou chute de neige.
Ces feux servent pour être vu des autres usagers, ils ne produisent pas un éclairage suffisant pour conduire de nuit ou en cas de mauvaise visibilité.</p>
            </div>
            <!-- feux2 -->
            <div class="feuxdeposition">
             <img src="../images/feuxpos-croisement-ic.jpg"> <h2>Feux de croisement</h2>
             <img src="../images/feuxpos-croisement.jpg" alt="">
              <p>Utilisation de nuit : hors et en agglomération, sur route éclairée en continu, si l'éclairage permet au conducteur de voir à une distance suffisante.
Utilisation de jour : hors et en agglomération, par temps de pluie, brouillard ou chute de neige.</p>
            </div>
            <!-- feux3 -->
            <div class="feuxdeposition">
             <img src="../images/feuxpos-route-ic.jpg"> <h2>Feux de route</h2>
             <img src="../images/feuxpos-route.jpg" alt="">
              <p>Utilisation de nuit uniquement, hors et en agglomération, lorsqu'il n'y a pas d'éclairage ou si l'éclairage ne permet pas de voir à une distance suffisante.
Lorsque je croise ou suis un autre véhicule je dois passer en feux de croisement.</p>
        </div>
        <!-- feux4 -->
        <div class="feuxdeposition">
             <img src="../images/feuxpos-brouillardavant-ic.jpg"> <h2>Feux de brouillard avant</h2>
             <img src="../images/feuxpos-brouillardavant.jpg" alt="">
              <p>Utilisation de jour : En cas de forte pluie, brouillard ou chute de neige, en complément ou remplacement des feux de croisement.
Utilisation de nuit : Hors agglomération, sur route étroites et sinueuse ils peuvent compléter les feux de route.</p>
        </div>
              <!-- feux5 -->
              <div class="feuxdeposition">
             <img src="../images/feuxpos-brouillardarriere-ic.jpg"> <h2>Feux de brouillard arriere</h2>
             <img src="../images/feuxpos-brouillardarriere.jpg" alt="">
              <p>Utilisation uniquement en cas de brouillard ou chute de neige.

Usage interdit par temps de pluie car trop éblouissants.</p>
        </div>
             <!-- Catégorie "vitesse" -->
             <div class="panneaux-categorie" id="vitesse">
                 <!-- Vitesse -->
             <h2 class="testh2">Vitesse maximale autorisée</h2>
           <img src="../images/vitesse.jpg" alt="">
           <p>Ce Tableau récapitule la vitesse maximale autorisée en fonction du type de route, des intempéries et de l'expérience du conducteur.</p>
       </div>
    </div>
        <!-- Ajoutez d'autres catégories et panneaux au besoin -->
    </section>
    <br><br>
    <?php require_once('../footer.php'); ?>

   <!-- Script JavaScript pour gérer l'affichage des catégories -->
   <script>
        var categorieDropdown = document.getElementById("categorie");
        var categories = document.getElementsByClassName("panneaux-categorie");

        categorieDropdown.addEventListener("change", function() {
            for (var i = 0; i < categories.length; i++) {
                categories[i].style.display = "none";
            }

            var selectedCategory = categorieDropdown.value;
            document.getElementById(selectedCategory).style.display = "block";
        });
    </script>
</body>
</html>