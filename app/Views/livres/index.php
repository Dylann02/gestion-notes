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
    }

    .table thead {
        background: #e6dcc2;
    }

    .table tbody tr:hover {
        background: #f3ead7;
    }

    .badge-dispo {
        background: #6c8a5c;
        color: white;
    }

    .badge-indispo {
        background: #a05a4a;
        color: white;
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

    input, select {
        border-radius: 6px !important;
        border: 1px solid #cbbf9d !important;
    }
</style>

<div class="vintage-card p-4 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
        <h2 class="vintage-title">Catalogue des livres</h2>

        <form action="<?= base_url('/') ?>" method="get" class="d-flex flex-wrap gap-2">
            <input type="text" name="keyword" class="form-control" 
                   placeholder="Rechercher un livre" 
                   value="<?= esc($keyword ?? '') ?>">

            <select name="categorie" class="form-select">
                <option value="">Toutes les catégories</option>
                <option value="Roman">Roman</option>
                <option value="Science-Fiction">Science-Fiction</option>
                <option value="Technique">Technique</option>
            </select>

            <button type="submit" class="btn btn-vintage">
                Rechercher
            </button>
        </form>
    </div>
</div>

<div class="vintage-card p-0">
    <table class="table mb-0 align-middle">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Année</th>
                <th>Statut</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livres as $livre): ?>
            <tr>
                <td>
                    <a href="<?= base_url('livres/voir/'.$livre['id']) ?>" class="text-decoration-none" style="color:#4b3f2f; font-weight:600;">
                        <?= esc($livre['titre']) ?>
                    </a>
                </td>
                <td><?= esc($livre['auteur']) ?></td>
                <td><?= esc($livre['annee_publication']) ?></td>
                <td>
                    <span class="badge <?= $livre['statut'] == 'disponible' ? 'badge-dispo' : 'badge-indispo' ?>">
                        <?= esc(ucfirst((string) ($livre['statut'] ?? ''))) ?>
                    </span>
                </td>
                <td>
                    <div class="d-flex flex-wrap gap-2 justify-content-center">

                        <?php if ($livre['statut'] == 'disponible'): ?>
                            <form action="<?= base_url('livres/louer/'.$livre['id']) ?>" method="post" class="d-flex gap-1">
                                <?= csrf_field() ?>
                                <input type="text" name="emprunteur" 
                                       class="form-control form-control-sm" 
                                       placeholder="Nom" required>
                                <button type="submit" class="btn btn-sm btn-outline-vintage">
                                    Prêter
                                </button>
                            </form>
                        <?php else: ?>
                            <form action="<?= base_url('livres/retourner/'.$livre['id']) ?>" method="post">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-outline-vintage">
                                    Retour
                                </button>
                            </form>
                        <?php endif; ?>

                        <form action="<?= base_url('livres/supprimer/'.$livre['id']) ?>" method="post" 
                              onsubmit="return confirm('Supprimer ce livre ?');">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-sm btn-danger">
                                Supprimer
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="mt-4 d-flex justify-content-center">
    <?= $pager->links() ?>
</div>

<?= $this->endSection() ?>