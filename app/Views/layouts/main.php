<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion de Bibliothèque</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font (style livre ancien) -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Georgia&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Georgia', serif;
            background: #f4ecd8;
            color: #3e3426;
        }

        /* Navbar vintage */
        .navbar {
            background: #5a4630 !important;
            border-bottom: 2px solid #3e3426;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            font-size: 1.5rem;
            color: #f4ecd8 !important;
        }

        .nav-link {
            color: #e6dcc2 !important;
            font-size: 0.95rem;
        }

        .nav-link:hover {
            color: #ffffff !important;
        }

        /* Conteneur principal */
        .card-container {
            background: #fffaf0;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #d6c7a1;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin-top: 20px;
        }

        /* Alertes */
        .alert-success {
            background: #e8f0e4;
            border: 1px solid #b6c7a8;
            color: #4b5f3a;
        }

        .alert-danger {
            background: #f3e4e1;
            border: 1px solid #d1a7a0;
            color: #6b3e38;
        }

        /* Footer */
        footer {
            margin-top: 40px;
            padding: 15px;
            text-align: center;
            color: #6b5a3a;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>">Ma Bibliothèque</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="<?= base_url('/') ?>">Catalogue</a>
                    <a class="nav-link" href="<?= base_url('livres/creer') ?>">Ajouter un livre</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu -->
    <div class="container">
        <div class="card-container">

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>

        </div>
    </div>

    <!-- Footer -->
    <footer>
                    <span class="footer-text">Gestion de bibliothèque © <?= date('Y') ?></span>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>