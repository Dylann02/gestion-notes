<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Bibliothèque</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4ecd8;
            font-family: Georgia, serif;
            color: #3e3426;
        }

        .card {
            background-color: #fffaf0;
            border: 1px solid #d6c7a1;
            border-radius: 8px;
        }

        .card-header {
            background-color: #5a4630;
            color: #f4ecd8;
            text-align: center;
        }

        .form-control {
            border: 1px solid #cbbf9d;
            background-color: #fffdf7;
        }

        .form-control:focus {
            border-color: #8b6f47;
            box-shadow: none;
        }

        .btn-vintage {
            background-color: #8b6f47;
            color: white;
            border: none;
        }

        .btn-vintage:hover {
            background-color: #6f5637;
        }

        .footer-text {
            font-size: 0.9rem;
            color: #6b5a3a;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">

        <div class="col-md-5 col-lg-4">

            <div class="card shadow-sm">

                <div class="card-header py-3">
                    <h5 class="mb-0">Connexion à la bibliothèque</h5>
                </div>

                <div class="card-body p-4">

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('login/authenticate') ?>" method="POST">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label">Adresse email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-vintage">
                                Se connecter
                            </button>
                        </div>
                    </form>

                </div>

                <div class="card-footer text-center bg-transparent">
                    <span class="footer-text">Gestion de bibliothèque © <?= date('Y') ?></span>
                </div>

            </div>

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>