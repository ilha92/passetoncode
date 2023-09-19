<footer id="site-footer">
        <div class="footer-links">
            <div class="footer-container">
                <div class="footer-column">
                    <h3>NOS cours</h3>
                    <ul>
                        <li><a href="../pages/cours.php">Cours</a></li>
                        <li><a href="../pages/panneaux.php">Panneaux</a></li>
                        <li><a href="../index.php">Passetoncode</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>NOS ENGAGEMENTS</h3>
                    <ul>
                        <li><a href="../pages/examen.php">Examens</a></li>
                        <li><a href="../pages/auto.php">auto-ecole</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>NEWSLETTER</h3>
                    <ul>
                        <li><a href="../footer/cookies.php">COOKIES</a></li>
                        <li><a href="../footer/personnel.php">DONNÉES PERSONNELLES</a></li>
                        <li><a href="../pages/contact.php">NOUS CONTACTER</a></li>
                        <li><a href="../footer/politique.php">POLITIQUE DE DIVULGATION RESPONSABLE</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Nous suivre</h3>
                    <br>
                    <ul>
                        <a href="https://twitter.com/ilias_hamel" target="_blank">
                            <img src="../footer/images/twitter.webp" alt="twitter">
                        </a>
                        <a href="https://www.instagram.com/ilcestinopizza.ve/" target="_blank">
                            <img src="../footer/images/instagram.webp" alt="instagram">
                        </a>
                        <a href="https://www.youtube.com/channel/UCphb30cQ73NmjWBmZvnad-Q" target="_blank">
                            <img src="../footer/images/youtube.webp" alt="Youtube">
                        </a>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Condition des Offres</h3>
                    <ul>
                        <li><a href="../pages/test.php">TEST</a></li>
                        <li><a href="../pages/cours.php">Cour</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-column">
                <h4>PAYEZ EN TOUTE SÉCURITÉ AVEC</h4>
                <ul>
                    <img src="../footer/images/visa.webp" alt="">
                    <img src="../footer/images/maestro.webp" alt="">
                    <img width="40" height="55" src="../footer/images/Paypal_2014_logo.png" alt="">
                    <img src="../footer/images/mastercard.webp" alt="">
                </ul>
            </div>

            <div class="footer-column">
                <ul>
                    <li><a href="../footer/mention.php">Mention Légales</a></li>
                    <li><a href="../footer/condition.php">CONDITIONS GÉNÉRALES DE VENTE</a></li>
                </ul>
            </div>
        </div>
    </footer>


    <script>
        // Sélectionner le footer
        var footer = document.getElementById("site-footer");

        // Fonction pour afficher ou masquer le footer en fonction de la position de défilement
        function toggleFooterVisibility() {
            var scrollPosition = window.scrollY;
            var footerPosition = document.body.offsetHeight - window.innerHeight;

            if (scrollPosition >= footerPosition) {
                footer.classList.remove("hidden");
            } else {
                footer.classList.add("hidden");
            }
        }

        // Écouter l'événement de défilement de la fenêtre
        window.addEventListener("scroll", toggleFooterVisibility);

        // Appeler la fonction au chargement initial de la page
        toggleFooterVisibility();

        // Écouter l'événement de changement de page
        window.addEventListener("load", function() {
            // Lorsque la page est chargée, appeler la fonction pour masquer le footer
            toggleFooterVisibility();
        });
    </script>