<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM employes WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
}

header("Location: ../views/gestionEmploye/employes.php");
exit();
