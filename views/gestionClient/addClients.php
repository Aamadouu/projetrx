<?php
include '../../config.php';

// Activer l'affichage des erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs sont remplis
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['entreprise'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $entreprise = $_POST['entreprise'];

        // Préparer et exécuter la requête
        $query = "INSERT INTO clients (nom, email, telephone, entreprise) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);

        if ($stmt->execute([$nom, $email, $telephone, $entreprise])) {
            header("Location: clients.php");
            exit();
        } else {
            $error = "Erreur lors de l'ajout du client.";
        }
    } else {
        $error = "Tous les champs sont obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Client</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h3>Ajouter un Client</h3>
            </div>
            <div class="card-body">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <form method="post" action="addClients.php">
                    <div class="mb-3">
                        <label class="form-label">Nom :</label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email :</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Téléphone :</label>
                        <input type="text" name="telephone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Entreprise :</label>
                        <input type="text" name="entreprise" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>