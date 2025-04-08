<?php
session_start();

// Exemple de liste d'entreprises
$entreprises = [
    ["nom" => "Entreprise 1", "description" => "Description de l'entreprise 1"],
    ["nom" => "Entreprise 2", "description" => "Description de l'entreprise 2"],
    ["nom" => "Entreprise 3", "description" => "Description de l'entreprise 3"],
    ["nom" => "Entreprise 4", "description" => "Description de l'entreprise 4"],
    ["nom" => "Entreprise 5", "description" => "Description de l'entreprise 5"],
    ["nom" => "Entreprise 6", "description" => "Description de l'entreprise 6"],
    ["nom" => "Entreprise 7", "description" => "Description de l'entreprise 7"],
    ["nom" => "Entreprise 8", "description" => "Description de l'entreprise 8"],
    ["nom" => "Entreprise 9", "description" => "Description de l'entreprise 9"],
    ["nom" => "Entreprise 10", "description" => "Description de l'entreprise 10"],
    ["nom" => "Entreprise 11", "description" => "Description de l'entreprise 11"],
    ["nom" => "Entreprise 12", "description" => "Description de l'entreprise 12"],
    ["nom" => "Entreprise 13", "description" => "Description de l'entreprise 12"],
    ["nom" => "Entreprise 14", "description" => "Description de l'entreprise 12"],
    ["nom" => "Entreprise 15", "description" => "Description de l'entreprise 12"],
    ["nom" => "Entreprise 16", "description" => "Description de l'entreprise 12"],
    ["nom" => "Entreprise 17", "description" => "Description de l'entreprise 12"],
    ["nom" => "Entreprise 18", "description" => "Description de l'entreprise 12"],
    ["nom" => "Entreprise 19", "description" => "Description de l'entreprise 12"],
    ["nom" => "Entreprise 20", "description" => "Description de l'entreprise 12"],
    // Ajoute d'autres entreprises si nécessaire
];

// Définir le nombre d'éléments par page
$limit = 10;

// Obtenir la page actuelle (si elle est définie, sinon page 1)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Vérifier si la page est valide
$totalEntreprises = count($entreprises);
$totalPages = ceil($totalEntreprises / $limit);
if ($page < 1 || $page > $totalPages) {
    header("Location: entreprise.php?page=1"); // Rediriger vers la première page si la page demandée n'est pas valide
    exit();
}

// Calculer l'offset (la position de départ pour la pagination)
$offset = ($page - 1) * $limit;

// Extraire les entreprises à afficher sur cette page
$entreprisesPage = array_slice($entreprises, $offset, $limit);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Inscription.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des entreprises</title>
    <link rel="stylesheet" href="../vue/Inscription.css">
    <style>
        .pagination a {
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
            color: #007bff;
        }

        .pagination a.active {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .pagination a:hover {
            background-color: #ddd;
        }

        .pagination span {
            margin: 0 5px;
            padding: 5px 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
        }
    </style>
</head>
<body>
<h1><strong>Lebonplan</strong></h1>
    <header> 
        <div class="menu-burger" onclick="toggleMenu()">☰</div> <!-- Menu Burger -->
        <nav> 
            <div class="un">
                <a href="">Accueil</a> <br> 
                <a href="entreprise.php">Entreprise</a> 
                <a href="offre.php">Offres</a> <br>
                <a href="../vue/mention.html">Mentions legales</a> <br>
                <a href="">Contact</a> <br>
            </div>
            <div class="deux">
                <a href="">Connexion</a>
                <a href="../index.html">S'inscrire</a>
            </div>
        </nav>
    </header>
    <h1>Liste des entreprises</h1>
    <ul>
        <?php foreach ($entreprisesPage as $entreprise): ?>
            <li>
                <h2><?php echo htmlspecialchars($entreprise['nom']); ?></h2>
                <p><?php echo htmlspecialchars($entreprise['description']); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Pagination -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="entreprise.php?page=<?php echo $page - 1; ?>">Précédent</a>
        <?php else: ?>
            <span>Précédent</span>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="entreprise.php?page=<?php echo $i; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="entreprise.php?page=<?php echo $page + 1; ?>">Suivant</a>
        <?php else: ?>
            <span>Suivant</span>
        <?php endif; ?>
    </div>
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