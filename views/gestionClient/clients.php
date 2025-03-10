<?php
session_start();
include '../../config.php';

// Vérifier si l'utilisateur est connecté
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

// Récupérer la liste des clients
$query = "SELECT * FROM clients";
$stmt = $pdo->prepare($query);
$stmt->execute();
$clients = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Clients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #084298;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Système de Gestion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../../index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="../gestionEmploye/employes.php">Employés</a></li>
                    <li class="nav-item"><a class="nav-link" href="../gestionClient/clients.php">Clients</a></li>
                    <li class="nav-item"><a class="nav-link active" href="../gestionDocument/documents.php">Documents</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Gestion des Clients</h2>
        <a href="addClients.php" class="btn btn-primary mb-3">Ajouter un Client</a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Entreprise</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client) : ?>
                    <tr>
                        <td><?= $client['id'] ?></td>
                        <td><?= $client['nom'] ?></td>
                        <td><?= $client['email'] ?></td>
                        <td><?= $client['telephone'] ?></td>
                        <td><?= $client['entreprise'] ?></td>
                        <td>
                            <a href="modifierClient.php?id=<?= $client['id'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="deleteClient.php?id=<?= $client['id'] ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>