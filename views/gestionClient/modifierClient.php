<?php
include '../../config.php';

// Vérifier si l'ID du client est bien passé en paramètre
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID du client invalide.");
}

$id = $_GET['id'];

// Récupérer les informations du client
$query = "SELECT * FROM clients WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$client = $stmt->fetch();

if (!$client) {
    die("Client introuvable.");
}

// Traitement de la mise à jour
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $entreprise = $_POST['entreprise'];

    $query = "UPDATE clients SET nom=?, email=?, telephone=?, entreprise=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    if ($stmt->execute([$nom, $email, $telephone, $entreprise, $id])) {
        header("Location: clients.php");
        exit();
    } else {
        $error = "Erreur lors de la mise à jour du client.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Client</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h3>Modifier un Client</h3>
            </div>
            <div class="card-body">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Nom :</label>
                        <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($client['nom']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email :</label>
                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($client['email']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Téléphone :</label>
                        <input type="text" name="telephone" class="form-control" value="<?= htmlspecialchars($client['telephone']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Entreprise :</label>
                        <input type="text" name="entreprise" class="form-control" value="<?= htmlspecialchars($client['entreprise']) ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>