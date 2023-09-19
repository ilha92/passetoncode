<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneaux</title>
    <!-- Inclure votre feuille de style CSS ici -->
</head>
<body>
<header>
     <?php require_once('../header/navbar.php'); ?>
</header>
<br><br>
    <section class="panneaux-section">
        <h1>Panneaux de signalisation du code de la route</h1>
<p>Vous pourrez trouver sur cette page, les images et définitions des différents signaux et panneaux de signalisation du code de la route</p>
        <!-- Liste déroulante pour choisir la catégorie -->
        <label for="categorie">Choisir une catégorie :</label>
        <select id="categorie">
            <option value="interdiction">Interdiction</option>
            <option value="obligation">Obligation</option>
            <!-- Ajoutez d'autres catégories ici -->
        </select>

        <!-- Catégorie "Interdiction" -->
        <div class="panneaux-categorie" id="interdiction">
            <!-- Panneau 1 -->
            <div class="panneau">
                <img src="../images/mini_b1.jpg" alt="Panneau 1">
                <p>Nom : B1
                Sens interdit à tout véhicule</p>
            </div>
            <!-- Panneau 2 -->
            <div class="panneau">
                <img src="../images/mini_b2a.jpg" alt="Panneau 2">
                <p>Nom : B2a
                Interdiction de tourner à gauche à la prochaine intersection</p>
            </div>
            <!-- Ajoutez d'autres panneaux ici -->
        </div>

        <!-- Catégorie "Obligation" -->
        <div class="panneaux-categorie" id="obligation">
            <!-- Panneau 3 -->
            <div class="panneau">
                <img src="../images/obligation droite.jpg" alt="Panneau 3">
                <p>Nom : B21-1
                Obligation de tourner à droite avant le panneau.</p>
            </div>
            <!-- Panneau 4 -->
            <div class="panneau">
                <img src="../images/obligation train.jpg" alt="Panneau 4">
                <p>Nom : B27b
                Voie réservée aux tramways</p>
            </div>
            <!-- Ajoutez d'autres panneaux ici -->
        </div>

        <!-- Ajoutez d'autres catégories et panneaux au besoin -->
    </section>

    <footer>
        <?php require_once('../footer.php'); ?>
    </footer>

    <!-- Script JavaScript pour gérer l'affichage des catégories -->
    <script>
        // Sélectionner la liste déroulante et les catégories de panneaux
        var categorieDropdown = document.getElementById("categorie");
        var categories = document.getElementsByClassName("panneaux-categorie");

        // Ajouter un écouteur d'événement pour détecter les changements dans la liste déroulante
        categorieDropdown.addEventListener("change", function() {
            // Cacher toutes les catégories de panneaux
            for (var i = 0; i < categories.length; i++) {
                categories[i].style.display = "none";
            }

            // Afficher la catégorie sélectionnée
            var selectedCategory = categorieDropdown.value;
            document.getElementById(selectedCategory).style.display = "block";
        });
    </script>
</body>
</html>