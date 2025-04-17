<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Inscription.css">
    <script src="java.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<body>
    <h1><strong>Lebonplan</strong></h1>
    <header> 
    <div class="menu-burger" onclick="toggleMenu()">☰</div> <!-- Menu Burger -->
    <nav class="nav-main"> 
        <div class="un">
            <a href="">Accueil</a>
            <a href="">Entreprise</a> 
            <a href="">Offres</a>
            <a href="">Mentions légales</a>
            <a href="">Contact</a>
        </div>
        <div class="deux">
            <a href="">Connexion</a>
            <a href="../index.html">S'inscrire</a>
        </div>
    </nav>
</header>
    <section class="form-container">
        <form action="../controller/connexion.php" method="post">
            <div class="form-group">
                <label for="nom">NOM</label>
                <input type="text" name="nom" id="nom" required>
                <label for="mail">MOT DE PASS</label>
                <input type="password" name="mdp" id="mdp" required>
            </div>
            <div class="form-buttons">
                <button type="submit">ENVOYER</button>
                <button type="reset">SUPRIMER</button>
            </div>
            <?php
if (isset($_SESSION['error'])) {
    echo "<p class='error'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
?>
        </form>
    </section>
    
</body>
</html>