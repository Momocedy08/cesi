<?php
session_start();

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $civilite = isset($_POST['civilite']) ? $_POST['civilite'] : '';
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
    $mail = isset($_POST['mail']) ? trim($_POST['mail']) : '';
    $permisB = isset($_POST['permisB']) ? 1 : 0;
    $vehicule = isset($_POST['vehicule']) ? 1 : 0;
    $certification = isset($_POST['certification']) ? 1 : 0;
    $majeur = isset($_POST['majeur']) ? $_POST['majeur'] : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $file = isset($_FILES['file']) ? $_FILES['file'] : null;

    $errors = [];

    // Validation des champs requis
    if (empty($nom)) {
        $errors[] = "Le champ Nom est requis.";
    }

    if (empty($prenom)) {
        $errors[] = "Le champ Prénom est requis.";
    }

    if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Un courriel valide est requis.";
    }

    if (empty($majeur)) {
        $errors[] = "Vous devez indiquer si vous êtes majeur.";
    }

    // Si des erreurs existent, les stocker dans la session et rediriger vers le formulaire
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: offre.php"); // Redirection vers le formulaire
        exit();
    }

    // Si tout est valide, continuer avec l'enregistrement ou autre traitement
    // Exemple : enregistrement dans une base de données

    echo "Formulaire soumis avec succès!";
} else {
    // Si la méthode n'est pas POST, rediriger ou gérer l'erreur
    header("Location: offre.php");
    exit();
}