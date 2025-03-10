<?php
include '../../config.php';

$id = $_GET['id'];
$query = "SELECT * FROM employes WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$employe = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $poste = $_POST['poste'];
    $date_embauche = $_POST['date_embauche'];

    $query = "UPDATE employes SET nom=?, email=?, telephone=?, poste=?, date_embauche=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nom, $email, $telephone, $poste, $date_embauche, $id]);

    header("Location: employes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un employé</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Modifier un Employé</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label">Nom :</label>
                <input type="text" name="nom" class="form-control" value="<?php echo htmlspecialchars($employe['nom']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email :</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($employe['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Téléphone :</label>
                <input type="text" name="telephone" class="form-control" value="<?php echo htmlspecialchars($employe['telephone']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Poste :</label>
                <input type="text" name="poste" class="form-control" value="<?php echo htmlspecialchars($employe['poste']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date d'embauche :</label>
                <input type="date" name="date_embauche" class="form-control" value="<?php echo htmlspecialchars($employe['date_embauche']); ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    </div>
</body>

</html>