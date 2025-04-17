<?php
session_start();
include '../modele/pd.php';

$parPage = 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $parPage;

$totalQuery = $pdo->query("SELECT COUNT(*) FROM entreprise");
$total = $totalQuery->fetchColumn();
$pages = ceil($total / $parPage);

$stmt = $pdo->prepare("SELECT * FROM entreprise LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $parPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$entreprises = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des entreprises</title>
    <link rel="stylesheet" href="/propro/vue/inscription.css">
<script src="/propro/vue/java.js" defer></script>
    <style>
        .entreprises-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            margin-top: 30px;
        }

        .entreprise-card {
            width: 100%;
            max-width: 500px;
            background-color: #f0f0f0;
            padding: 15px 20px;
            border-radius: 10px;
            border: 2px solid #333;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .pagination {
            margin-top: 30px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .pagination a {
            text-decoration: none;
            color: aliceblue;
            background-color: #423f3f;
            padding: 8px 14px;
            border-radius: 5px;
            font-weight: bold;
        }

        .pagination a:hover {
            background-color: coral;
            color: white;
        }

        .pagination a.active {
            background-color: coral;
            color: white;
            font-weight: bold;
        }/* Styles pour la barre de navigation */
    header {
        display: flex;
        justify-content: space-between; /* Espacement entre les groupes */
        align-items: center; /* Alignement vertical */
        padding: 10px 20px;
        background-color: #423f3f; /* Couleur de fond */
    }

    nav {
        display: flex;
        justify-content: space-between; /* Assure un espacement égal entre les groupes */
        width: 100%; /* Prendre toute la largeur */
    }

    .un {
        display: flex;
        gap: 15px; /* Espacement entre les liens du groupe gauche */
    }

    .deux {
        display: flex;
        gap: 15px; /* Espacement entre les liens du groupe droit */
    }

    a {
        text-decoration: none;
        color: aliceblue;
        font-weight: bold;
    }

    a:hover {
        color: coral; /* Changement de couleur au survol */
    }

    .menu-burger {
        display: none;
        font-size: 30px;
        cursor: pointer;
        color: white;
    }

    @media (max-width: 768px) {
        nav {
            display: none; /* Cache le menu par défaut sur mobile */
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
            background-color: #423f3f;
            padding: 10px;
        }

        .menu-burger {
            display: block; /* Affiche l'icône du menu burger */
        }

        .nav-active {
            display: flex !important; /* Affiche le menu lorsqu'il est activé */
        }

        .un, .deux {
            width: 100%; /* Les liens prennent toute la largeur */
            flex-direction: column;
        }

        a {
            padding: 10px 0;
            text-align: left; /* Aligne les liens à gauche sur mobile */
        }
    }
    </style>
</head>
<body>
<h1><strong>Lebonplan</strong></h1>
<header> 
    <div class="menu-burger" onclick="toggleMenu()">☰</div> <!-- Menu Burger -->
    <nav class="nav-main"> 
        <div class="un">
            <a href="">Accueil</a>
            <a href="entreprise.php">Entreprise</a> 
            <a href="offre.php">Offres</a>
            <a href="../vue/mention.html">Mentions légales</a>
            <a href="">Contact</a>
        </div>
        <div class="deux">
            <a href="">Connexion</a>
            <a href="">S'inscrire</a>
        </div>
    </nav>
</header>

    <h1><strong>Liste des entreprises</strong></h1>

    <div class="entreprises-container">
        <?php foreach ($entreprises as $entreprise): ?>
            <div class="entreprise-card">
                <?= htmlspecialchars($entreprise['NOM']) ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="pagination">
        <?php for ($i = 1; $i <= $pages; $i++): ?>
            <a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>">
                Page <?= $i ?>
            </a>
        <?php endfor; ?>
    </div>

</body>
</html>