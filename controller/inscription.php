<?php
include '../modele/pd.php'; // connexion à la BDD

if (isset($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['mdp'], $_POST['confirme'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = $_POST['mdp'];
    $confirme = $_POST['confirme'];

    // Vérification des mots de passe
    if ($mdp !== $confirme) {
        echo "❌ Les mots de passe ne correspondent pas.";
        exit;
    }

    // Hachage du mot de passe
    $hash = password_hash($mdp, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO inscription (NOM, PRENOM, MAIL, MDP)
                               VALUES (:nom, :prenom, :mail, :mdp)");

        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':mail' => $mail,
            ':mdp' => $hash
        ]);

        header("Location: ../vue/connnexion.php"); 

    } catch (PDOException $e) {
        echo "❗ Erreur lors de l'insertion : " . $e->getMessage();
    }

} else {
    echo "❗ Veuillez remplir tous les champs.";
}
?>