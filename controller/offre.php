<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../vue/Inscription.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>monsite</title>
    <script src="java.js" defer></script>
</head>
<body>
    <h1><strong>Lebonplan</strong></h1>
    <header> 
        <div class="menu-burger" onclick="toggleMenu()">☰</div> <!-- Menu Burger -->
        <nav> 
            <div class="un">
                <a href="">Accueil</a> <br> 
                <a href="entreprise.php">Entreprise</a> 
                <a href="">Offres</a> <br>
                <a href="../vue/mention.html">Mentions legales</a> <br>
                <a href="">Contact</a> <br>
            </div>
            <div class="deux">
                <a href="">Connexion</a>
                <a href="../index.html">S'inscrire</a>
            </div>
        </nav>
    </header>
    <section> 
        <h1><strong>postuler a cette offre de stage</strong></h1>
        <p>
            vous pouvez ici repondre directement à l'offre de stage qui a été déposé par l'entreprise. Soiyez le plus precis possible dans vos reponses !
        </p>
        <h1>Stage Administration Système et Réseau H/F</h1>
        <p>
            IBM publié le 20/01/2025 REF 12278V3
        </p>
        <h1>Résumé de l'offre</h1>
        <div class="trois">
        <h6 class="box">3 mois</h6>
        <h6 class="box">Bac +2 Bac +3</h6>
        <h6 class="box">Système Reseau Cloud</h6>
        <h6 class="box">Exp 1an</h6>
        </div>
    </section>
    <section class="form-container">
    <?php
// Affichage des messages d'erreur
if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        echo "<p style='color: red;'>" . htmlspecialchars($error) . "</p>";
    }
    unset($_SESSION['errors']); // Effacer les erreurs après affichage
}
?>
        <form action="controller.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="civilite">CIVILITÉ</label>
                <select name="civilite" id="civilite">
                    <option value="Mm">Madame</option>
                    <option value="M">Monsieur</option>
                    <option value="A">Autre</option>
                </select>
            </div>
    
            <div class="form-group">
                <label for="nom">NOM</label>
                <input type="text" name="nom" id="nom" >
    
                <label for="prenom">PRÉNOM</label>
                <input type="text" name="prenom" id="prenom" >
    
                <label for="mail">COURRIEL</label>
                <input type="email" name="mail" id="mail" >
            </div>
    
            <fieldset class="form-group">
                <legend>À PROPOS DE VOUS</legend>
                <div class="quatre">
                    <label><input type="checkbox" name="permisB"> Permis B</label>
                    <label><input type="checkbox" name="vehicule"> Véhiculé</label>
                    <label><input type="checkbox" name="certification"> Certification (Microsoft, Cisco...)</label>
                </div>
            </fieldset>
    
            <fieldset class="form-group">
                <legend>ÊTES-VOUS MAJEUR ?</legend>
                <div class="quatre">
                    <label class="quatre"><input type="radio" name="majeur" value="oui"> Oui</label>
                    <label class="quatre"><input type="radio" name="majeur" value="non"> Non</label>
                </div>
            </fieldset>
    
            <div class="form-group">
                <label for="message">VOTRE MESSAGE AU RECRUTEUR</label>
                <textarea name="message" id="message" rows="4"></textarea>
            </div>
    
            <div class="form-group">
                <label for="fileInput">CV</label>
                <input type="file" name="file" id="fileInput" accept="image/*, .pdf, .docx">
            </div>
    
            <div class="form-buttons">
                <button type="submit">POSTULER</button>
                <button type="reset">RÉINITIALISER</button>
            </div>
        </form>
    </section>
    <footer>
        <nav> 
            <div class="un">
                <a href="">Twiter</a>
                <a href="">facebook</a> 
                <a href=""> Instagram</a>
            </div>
            <div class="deux">
                <a href="">Linkdin</a>
                <a href="">Apec</a>
            </div>
        </nav>
    </footer>
    <button id="topButton" onclick="scrollToTop()">⬆ Haut</button>
</body>
</html>