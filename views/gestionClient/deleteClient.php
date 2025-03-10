<?php
include '../../config.php';

// Vérifier si l'ID du client est passé en paramètre
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID du client invalide.");
}

$id = $_GET['id'];

// Supprimer le client de la base de données
$query = "DELETE FROM clients WHERE id = ?";
$stmt = $pdo->prepare($query);

if ($stmt->execute([$id])) {
    header("Location: clients.php");
    exit();
} else {
    die("Erreur lors de la suppression du client.");
}
