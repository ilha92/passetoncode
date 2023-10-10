<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programme de Fidélité - Auto-École XYZ</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1>Programme de Fidélité</h1>
        <?php require_once('../header/navbar.php'); ?>
    </header>
    <main>
        <section class="loyalty-program">
            <h2>Notre Programme de Fidélité</h2>
            <p>Notre auto-école propose un programme de fidélité pour récompenser nos élèves les plus assidus. En participant à notre programme de fidélité, vous pouvez bénéficier d'avantages exclusifs.</p>
        </section>

        <section class="loyalty-benefits">
            <h2>Avantages du Programme</h2>
            <ul>
                <li>Réductions spéciales sur les leçons de conduite</li>
                <li>Priorité de planification pour les cours de conduite</li>
                <li>Accès à des ressources de formation gratuites</li>
                <li>Cadeaux et récompenses exclusives</li>
            </ul>
        </section>

        <section class="how-to-join">
            <h2>Comment Rejoindre</h2>
            <p>Pour rejoindre notre programme de fidélité, il vous suffit de vous inscrire en tant qu'élève dans notre auto-école. Vous accumulerez automatiquement des points de fidélité à chaque leçon de conduite que vous suivrez.</p>
        </section>
    </main>
    <?php require_once('../footer.php'); ?>
</body>
</html>
