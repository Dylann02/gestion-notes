<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    body {
        background: #f4ecd8;
        font-family: 'Georgia', serif;
    }

    .vintage-card {
        background: #fffaf0;
        border: 1px solid #d6c7a1;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .vintage-title {
        font-weight: bold;
        color: #4b3f2f;
        margin-bottom: 15px;
    }

    .info-label {
        color: #6b5a3a;
        font-weight: bold;
        min-width: 100px;
        display: inline-block;
    }

    .info-value {
        color: #3e3426;
    }

    .resume-box {
        background: #f7f1e1;
        border: 1px solid #e0d2b4;
        border-radius: 8px;
        padding: 15px;
    }

    .emprunt-box {
        background: #efe6cf;
        border: 1px solid #d6c7a1;
        border-radius: 8px;
        padding: 15px;
    }

    .btn-vintage {
        border: 1px solid #8b6f47;
        color: #8b6f47;
        background: transparent;
    }

    .btn-vintage:hover {
        background: #8b6f47;
        color: white;
    }

    .placeholder-img {
        background: #ede3c7;
        border: 1px solid #d6c7a1;
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #7a6a4f;
        border-radius: 8px;
    }
</style>

<div class="vintage-card p-4">
    <div class="row g-4">

        <!-- Image -->
        <div class="col-md-4 text-center">
            <?php if ($livre['couverture']): ?>
                <img src="<?= base_url('uploads/' . $livre['couverture']) ?>" 
                     class="img-fluid" 
                     style="max-height:350px; object-fit:cover; border:1px solid #d6c7a1; border-radius:8px;">
            <?php else: ?>
                <div class="placeholder-img">
                    Aucune couverture
                </div>
            <?php endif; ?>
        </div>

        <!-- Infos -->
        <div class="col-md-8">
            <h2 class="vintage-title"><?= esc($livre['titre']) ?></h2>

            <p>
                <span class="info-label">Auteur :</span>
                <span class="info-value"><?= esc($livre['auteur']) ?></span>
            </p>

            <p>
                <span class="info-label">ISBN :</span>
                <span class="info-value"><?= esc($livre['isbn']) ?></span>
            </p>

            <p>
                <span class="info-label">Catégorie :</span>
                <span class="info-value"><?= esc($livre['categorie']) ?></span>
            </p>

            <?php $resume = is_string($livre['resume'] ?? null) ? $livre['resume'] : ''; ?>

            <div class="resume-box mb-4">
                <strong>Résumé</strong>
                <p class="mb-0 mt-2"><?= nl2br((string) esc($resume)) ?></p>
            </div>

            <div class="emprunt-box">
                <strong>Dernier emprunteur</strong>

                <?php if ($dernierEmprunt): ?>
                    <p class="mb-0 mt-2">
                        <?= esc($dernierEmprunt['nom_emprunteur']) ?><br>
                        <small>Le <?= esc($dernierEmprunt['date_emprunt']) ?></small>
                    </p>
                <?php else: ?>
                    <p class="mb-0 mt-2">Aucun emprunt enregistré.</p>
                <?php endif; ?>
            </div>

            <div class="mt-4">
                <a href="<?= base_url('/') ?>" class="btn btn-vintage px-4">
                    Retour
                </a>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
