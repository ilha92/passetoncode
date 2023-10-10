<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
</head>
<body>
    <header>
        <?php require_once('../header/navbar.php'); ?>
    </header>
    <br><br><br><br>
    <section class="video section section-text-light section-video section-center mt-none" data-video-path="https://static.passetoncode.fr/sitev2/video/video-code-de-la-route" data-plugin-video-background="" data-plugin-options="{&quot;posterType&quot;: &quot;jpg&quot;, &quot;position&quot;: &quot;50% 50%&quot;, &quot;overlay&quot;: false}">
    <div style="position: absolute; z-index: -1; inset: 0px; overflow: hidden; background-size: cover; background-color: transparent; background-repeat: no-repeat; background-position: 50% 50%; background-image: none;">
        <video autoplay="" loop="" muted="" style="margin: auto; position: absolute; z-index: -1; top: 50%; left: 50%; transform: translate(-50%, -50%); visibility: visible; opacity: 1; width: auto; height: 582px;">
            <source src="https://static.passetoncode.fr/sitev2/video/video-code-de-la-route.mp4" type="video/mp4">
            <source src="https://static.passetoncode.fr/sitev2/video/video-code-de-la-route.webm" type="video/webm">
            <source src="https://static.passetoncode.fr/sitev2/video/video-code-de-la-route.ogv" type="video/ogg">
        </video>
    </div>
    <!-- Ajout du texte sur la vidéo -->
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white; font-size: 24px; z-index: 1;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="mr-sm" style="display: inline">Code de la route</h1>
                    <span class="label label-lg label-primary rounded appear-animation flash appear-animation-visible" style="vertical-align: 5px;">Gratuit</span>
                    <br>
                    <img class="img-responsive center-block" src="https://static.passetoncode.fr/sitev2/img/passetoncode-mini.png" alt=""><br>
                    <p class="mb-none">Parce que le permis de conduire coûte cher et que vous n'avez pas forcément le temps d'aller à l'auto-école,</p>
                    <p>PasseTonCode vous offre la possibilité de réviser le code de la route gratuitement de chez vous.</p>
                    <p class="mb-none">Passetoncode.fr est un site d'entraînement à l'examen du code de la route entièrement gratuit. Testez vous</p>
                    <p>sur 40 questions dans les conditions réelles d'examen ou par séries de 20 questions sur un thème de votre choix.</p>
                    <p>Vous apprenez à votre rythme et pouvez suivre votre progression grâce à des statistiques détaillées.</p><br>
                    <a href="../index.html" class="btn btn-3d btn-primary btn-lg mr-xs">Testez moi !</a>
                    <a href="../acces/register.php" class="btn btn-3d btn-secondary btn-lg">Je m'inscris</a>
                </div>
            </div>
        </div>
    </div>
</section>
   </section>
</body>
</html>