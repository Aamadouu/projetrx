<?php
include '../../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM documents WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
}

header("Location: documents.php");
exit();
