<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir un département</title>
    <style>
        /* Ajoutez du style CSS ici */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
    </style>
</head>
<body>
<header>
     <?php require_once('../header/navbar.php'); ?>
</header>
<br><br>
    <h1>Réservez votre place pour l'examen !</h1>
    <p>Cette page vous permet de réserver une place pour passer l'examen officiel du code de la route avec La Poste.</p>
    <div class="container">
        <h1>Choisir un département</h1>
        <label for="departement">Département :</label>
        <select id="departement">
            <option value="">Sélectionner un département</option>
            <option value="1">Haut-de-seine -92</option>
            <option value="2">Seine-Et-Marne -77</option>
            <!-- Ajoutez d'autres départements ici -->
        </select>

        <label for="ville">Ville :</label>
        <select id="ville" disabled>
            <option value="">Sélectionner une ville</option>
        </select>

        <button id="afficherInfos">Afficher les informations du centre de conduite</button>

        <div id="resultat">
            <!-- Les informations sur le centre de conduite seront affichées ici -->
        </div>
    </div>

    <script>
        const departementSelect = document.getElementById("departement");
        const villeSelect = document.getElementById("ville");
        const afficherInfosBtn = document.getElementById("afficherInfos");
        const resultatDiv = document.getElementById("resultat");

        // Exemple de données de villes par département (vous devez remplacer ceci par des données réelles)
        const villesParDepartement = {
            1: ["Nanterre", "Courbevoie", "Clichy"],
            2: ["Chelles", "Melun", "Champs-sur-Marne"],
            // Ajoutez d'autres départements et leurs villes ici
        };

        // Mettre à jour la liste des villes lorsque le département change
        departementSelect.addEventListener("change", () => {
            const selectedDepartement = departementSelect.value;
            villeSelect.innerHTML = "<option value=''>Sélectionner une ville</option>";
            
            if (selectedDepartement && villesParDepartement[selectedDepartement]) {
                villesParDepartement[selectedDepartement].forEach((ville) => {
                    const option = document.createElement("option");
                    option.value = ville;
                    option.textContent = ville;
                    villeSelect.appendChild(option);
                });
                villeSelect.disabled = false;
            } else {
                villeSelect.disabled = true;
            }
        });

        // Afficher les informations du centre de conduite lorsque le bouton est cliqué
        afficherInfosBtn.addEventListener("click", () => {
            const selectedVille = villeSelect.value;
            if (selectedVille) {
                // Vous pouvez ajouter du code ici pour afficher les informations du centre de conduite en fonction de la ville choisie
                resultatDiv.innerHTML = `Informations pour la ville : ${selectedVille}`;
            } else {
                resultatDiv.innerHTML = "Sélectionnez d'abord une ville.";
            }
        });
    </script>
</body>
</html>