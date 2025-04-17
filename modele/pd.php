<?php
$host = 'mysql-momo.alwaysdata.net'; // à adapter
$dbname = 'momo_stage'; // nom de la base créée chez AlwaysData
$username = 'momo'; // ton identifiant AlwaysData
$password = 'suxzuR-hotbac-2fenke'; // le mot de passe défini pour l'utilisateur MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie !";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>