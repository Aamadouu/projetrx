<?php
include '../../config.php';

$query = "SELECT * FROM employes";
$statement = $pdo->prepare($query);
$statement->execute();
$employes = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des employés</title>
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
                    <li class="nav-item"><a class="nav-link active" href="employes.php">Employés</a></li>
                    <li class="nav-item"><a class="nav-link" href="../gestionClient/clients.php">Clients</a></li>
                    <li class="nav-item"><a class="nav-link" href="../gestionDocument/documents.php">Documents</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Liste des employés</h2>
        <a href="addEmployes.php" class="btn btn-primary mb-3">Ajouter un employé</a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Poste</th>
                    <th>Date d'embauche</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employes as $employe) : ?>
                    <tr>
                        <td><?= $employe['id'] ?></td>
                        <td><?= $employe['nom'] ?></td>
                        <td><?= $employe['email'] ?></td>
                        <td><?= $employe['telephone'] ?></td>
                        <td><?= $employe['poste'] ?></td>
                        <td><?= $employe['date_embauche'] ?></td>
                        <td>
                            <a href="modifierEmployes.php?id=<?= $employe['id'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="../../controllers/deleteEmployes.php?id=<?= $employe['id'] ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>