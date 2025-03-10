<!-- fichier de test pas encore fini -->


<!-- <?php
        session_start();
        include '../../config.php';

        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
        }

        // Définir le bon dossier d'upload
        $uploadDir = __DIR__ . '/../../uploads/';

        // Vérifier si le dossier existe, sinon le créer
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Traitement de l'upload
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $fileTmpPath = $_FILES['file']['tmp_name'];
            $fileName = time() . '_' . basename($_FILES['file']['name']); // Ajouter un timestamp pour éviter les conflits
            $uploadFile = $uploadDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $uploadFile)) {
                $query = "INSERT INTO documents (nom_fichier, type_fichier, chemin_fichier, date_upload) VALUES (?, ?, ?, NOW())";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$fileName, pathinfo($fileName, PATHINFO_EXTENSION), $fileName]);
                $_SESSION['message'] = "Fichier téléversé avec succès !";
            } else {
                $_SESSION['error'] = "Erreur lors du téléversement du fichier.";
            }
        }

        // Redirection après l'upload
        header("Location: documents.php");
        exit();
        ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Téléverser un Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #084298;
        }

        .file-upload-container {
            border: 2px dashed #0d6efd;
            padding: 30px;
            text-align: center;
            background-color: #cfe2ff;
            cursor: pointer;
            transition: all 0.3s;
        }

        .file-upload-container:hover {
            background-color: #e8f0fe;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Système de Gestion</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="mb-0">Téléverser un Document</h5>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="file-upload-container" onclick="document.getElementById('fileInput').click()">
                        <input type="file" id="fileInput" name="file" class="d-none" required />
                        <i class="fas fa-cloud-upload-alt fa-3x mb-3" style="color: #0d6efd;"></i>
                        <h5>Glissez et déposez un fichier ici</h5>
                        <p class="text-muted mb-0">ou cliquez pour sélectionner un fichier</p>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Téléverser</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html> -->