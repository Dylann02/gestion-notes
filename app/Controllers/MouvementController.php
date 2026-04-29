<?php

namespace App\Controllers;

use App\Models\LivreModel;
use App\Models\EmpruntModel;
use CodeIgniter\Controller;

class MouvementController extends BaseController
{
    protected $livreModel;
    protected $empruntModel;

    public function __construct()
    {
        $this->livreModel = new LivreModel();
        $this->empruntModel = new EmpruntModel();
    }

    public function louer($id)
    {
        
    $livre = $this->livreModel->find($id);
        if (!$livre) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Livre introuvable.");
        }

        if ($livre['statut'] !== 'disponible') {
            return redirect()->back()->with('error', 'Ce livre est déjà prêté.');
        }

        $nomEmprunteur = $this->request->getPost('emprunteur');
        if (empty($nomEmprunteur)) {
            return redirect()->back()->with('error', 'Le nom de l\'emprunteur est obligatoire.');
        }

        
        $this->empruntModel->save([
            'livre_id'       => $id,
            'nom_emprunteur' => $nomEmprunteur,
            'date_emprunt'   => date('Y-m-d H:i:s'),
            'date_retour'    => null
        ]);

        $this->livreModel->update($id, ['statut' => 'prete']);

        return redirect()->to('/livres/' . $id)->with('success', 'Le prêt a été enregistré avec succès.');
    }

    public function retourner($id)
    {
        $livre = $this->livreModel->find($id);
        if (!$livre || $livre['statut'] !== 'prete') {
            return redirect()->back()->with('error', 'Impossible de rendre un livre qui n\'est pas prêté.');
        }

        $dernierEmprunt = $this->empruntModel
            ->where('livre_id', $id)
            ->where('date_retour', null)
            ->orderBy('date_emprunt', 'DESC')
            ->first();

        if ($dernierEmprunt) {
            $this->empruntModel->update($dernierEmprunt['id'], [
                'date_retour' => date('Y-m-d H:i:s')
            ]);
        }
        $this->livreModel->update($id, ['statut' => 'disponible']);

        return redirect()->to('/livres/' . $id)->with('success', 'Le livre a été marqué comme retourné.');
    }
}