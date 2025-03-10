<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Gestion SmartTech</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <!-- Ajoute FontAwesome -->
    <style>
        /* Effet survol navbar */
        .navbar-nav .nav-link {
            transition: color 0.3s ease-in-out;
        }

        .navbar-nav .nav-link:hover {
            color: #f8d210 !important;
            /* Jaune doré */
        }

        /* Style global */
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        /* Pied de page stylé */
        footer {
            background: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        footer a {
            color: #f8d210;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Barre de navigation simplifiée -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">SmartTech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"></ul> <!-- Suppression des icônes dans la navbar -->

                <div class="ms-3">
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <span class="text-white me-2">👤
                            <?= $_SESSION['nom']; ?>
                        </span>
                        <a href="views/logout.php" class="btn btn-danger">🚪 Déconnexion</a>
                    <?php else : ?>
                        <a href="views/login.php" class="btn btn-outline-light me-2">🔑 Connexion</a>
                        <!-- <a href="views/register.php" class="btn btn-warning text-dark">📝 Inscription</a> -->

                    <?php endif; ?>
                </div>

            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="container my-5">
        <header class="bg-primary text-white text-center py-5">
            <div class="container">
                <h1>Bienvenue sur SmartTech</h1>
                <p class="lead">Une plateforme pour la gestion des employés, clients et documents.</p>
            </div>
        </header>

        <!-- Section avec icônes -->
        <section class="row text-center">
            <div class="col-md-4">
                <div class="card p-3 shadow">
                    <i class="fas fa-users fa-3x text-primary"></i> <!-- Icône employés -->
                    <h3 class="mt-3">Gestion des employés</h3>
                    <p>Ajoutez, modifiez et supprimez les employés.</p>
                    <a href="views/gestionEmploye/employes.php" class="btn btn-primary">Voir les employés</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 shadow">
                    <i class="fas fa-user-tie fa-3x text-success"></i> <!-- Icône clients -->
                    <h3 class="mt-3">Gestion des clients</h3>
                    <p>Suivez et consultez les informations des clients.</p>
                    <a href="views/gestionClient/clients.php" class="btn btn-success">Voir les clients</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 shadow">
                    <i class="fas fa-folder-open fa-3x text-warning"></i> <!-- Icône documents -->
                    <h3 class="mt-3">Gestion des documents</h3>
                    <p>Stockez et partagez des fichiers.</p>
                    <a href="views/gestionDocument/documents.php" class="btn btn-warning">Voir les documents</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Pied de page amélioré -->
    <footer>
        <div class="container">
            <p class="mb-2">&copy; 2024 SmartTech - Tous droits réservés.</p>
            <p>
                <a href="views/contact.php">Contact</a> |
                <a href="views/politique.php">Politique de confidentialité</a> |
                <a href="views/mentions.php">Mentions légales</a>
            </p>
        </div>
    </footer>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <!-- Script FontAwesome -->

</body>

</html>