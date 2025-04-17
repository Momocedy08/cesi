<?php
session_start();
include '../modele/pd.php'; // ta connexion PDO

if (isset($_POST['nom'], $_POST['mdp'])) {
    $nom = $_POST['nom'];
    $mdp = $_POST['mdp'];

    // Récupère l'utilisateur correspondant à ce nom
    $stmt = $pdo->prepare("SELECT * FROM inscription WHERE NOM = :nom");
    $stmt->execute([':nom' => $nom]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifie si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($mdp, $user['MDP'])) {
        // Connexion réussie, stockage de l'utilisateur dans la session
        $_SESSION['user'] = $user['NOM']; // ou d'autres informations utiles
        header("Location: offre.php"); // Redirige vers la page offre.php
        exit;
    } else {
        // Mot de passe ou nom incorrect
        $_SESSION['error'] = "❌ Nom ou mot de passe incorrect.";
        header("Location: ../vue/connnexion.php"); // ou ta page de login
        exit;
    }
} else {
    // Si les champs sont manquants
    $_SESSION['error'] = "❗ Tous les champs sont obligatoires.";
    header("Location: ../vue/connexion.html"); // ou ta page de login
    exit;
}