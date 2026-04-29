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
        letter-spacing: 1px;
        text-align: center;
    }

    label {
        color: #4b3f2f;
    }

    input, select, textarea {
        border-radius: 6px !important;
        border: 1px solid #cbbf9d !important;
        background: #fffdf7 !important;
    }

    input:focus, select:focus, textarea:focus {
        border-color: #8b6f47 !important;
        box-shadow: none !important;
    }

    .btn-vintage {
        background: #8b6f47;
        color: white;
        border: none;
    }

    .btn-vintage:hover {
        background: #6f5637;
    }

    .btn-outline-vintage {
        border: 1px solid #8b6f47;
        color: #8b6f47;
    }

    .btn-outline-vintage:hover {
        background: #8b6f47;
        color: white;
    }

    .invalid-feedback {
        font-size: 0.85rem;
    }
</style>

<div class="vintage-card p-4 mx-auto" style="max-width: 650px;">
    <h3 class="vintage-title mb-4">Ajouter un livre</h3>

    <form action="<?= base_url('livres/enregistrer') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="titre" 
                   class="form-control <?= isset($errors['titre']) ? 'is-invalid' : '' ?>" 
                   value="<?= old('titre') ?>">
            <div class="invalid-feedback"><?= $errors['titre'] ?? '' ?></div>
        </div>

        <div class="mb-3">
            <label class="form-label">Auteur</label>
            <input type="text" name="auteur" 
                   class="form-control <?= isset($errors['auteur']) ? 'is-invalid' : '' ?>" 
                   value="<?= old('auteur') ?>">
            <div class="invalid-feedback"><?= $errors['auteur'] ?? '' ?></div>
        </div>

        <div class="mb-3">
            <label class="form-label">ISBN</label>
            <input type="text" name="isbn" 
                   class="form-control <?= isset($errors['isbn']) ? 'is-invalid' : '' ?>" 
                   value="<?= old('isbn') ?>">
            <div class="invalid-feedback"><?= $errors['isbn'] ?? '' ?></div>
        </div>

        <div class="mb-3">
            <label class="form-label">Année de publication</label>
            <input type="number" name="annee_publication" 
                   class="form-control <?= isset($errors['annee_publication']) ? 'is-invalid' : '' ?>" 
                   max="<?= date('Y') ?>"
                   value="<?= old('annee_publication') ?>">
            <div class="invalid-feedback"><?= $errors['annee_publication'] ?? '' ?></div>
        </div>

        <div class="mb-3">
            <label class="form-label">Catégorie</label>
            <select name="categorie" class="form-select">
                <option value="Roman" <?= old('categorie') == 'Roman' ? 'selected' : '' ?>>Roman</option>
                <option value="Science-Fiction" <?= old('categorie') == 'Science-Fiction' ? 'selected' : '' ?>>Science-Fiction</option>
                <option value="Technique" <?= old('categorie') == 'Technique' ? 'selected' : '' ?>>Technique</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Résumé</label>
            <textarea name="resume" class="form-control" rows="4"><?= old('resume') ?></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label">Couverture</label>
            <input type="file" name="couverture" 
                   class="form-control <?= isset($errors['couverture']) ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback"><?= $errors['couverture'] ?? '' ?></div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="<?= base_url('/') ?>" class="btn btn-outline-vintage">
                Annuler
            </a>

            <button type="submit" class="btn btn-vintage px-4">
                Enregistrer
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>