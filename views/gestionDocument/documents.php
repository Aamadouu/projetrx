<?php
session_start();
include '../../config.php';

// Vérifier si l'utilisateur est connecté
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

// Récupérer les documents
$query = "SELECT * FROM documents";
$stmt = $pdo->prepare($query);
$stmt->execute();
$documents = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Documents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #084298;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .table thead {
            background-color: #0d6efd;
            color: white;
        }

        .action-buttons .btn {
            margin-right: 5px;
        }

        .card {
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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

    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5 class="mb-0">Gestion des Documents</h5>
                <a href="addDocuments.php" class="btn btn-light"><i class="fas fa-upload"></i> Ajouter</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom du Fichier</th>
                                <th>Type</th>
                                <th>Date d'Upload</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($documents as $document) : ?>
                                <tr>
                                    <td><?= $document['id'] ?></td>
                                    <td><i class="fas fa-file-alt me-2 text-primary"></i> <?= $document['nom_fichier'] ?></td>
                                    <td><?= strtoupper($document['type_fichier']) ?></td>
                                    <td><?= $document['date_upload'] ?></td>
                                    <td>
                                        <a href="uploader.php<?= $document['chemin_fichier'] ?>" class="btn btn-success btn-sm" download>
                                            <i class="fas fa-download"></i>
                                        </a>

                                        <a href="modifierDocument.php" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#previewModal" onclick="previewDocument('<?= $document['chemin_fichier'] ?>')">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="deleteDocument.php?id=<?= $document['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce document ?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer bg-dark text-white text-center py-3 mt-4">
        <p>© 2025 Système de Gestion. Tous droits réservés.</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewDocument(filePath) {
            document.getElementById('previewFrame').src = '../uploads/' + filePath;
        }
    </script>

    <div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Aperçu du Document</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <iframe id="previewFrame" src="" style="width:100%; height:500px; border:none;"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>