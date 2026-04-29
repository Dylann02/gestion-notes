<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LivreModel;
use App\Models\EmpruntModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class LivresController extends BaseController
{

    protected $livreModel;
    protected $empruntModel;

    public function  __construct()
    {
        $this->livreModel = new LivreModel();
        $this->empruntModel = new EmpruntModel();
    }

    public function index()
    {
        $keyword   = $this->request->getGet('search');
        $categorie = $this->request->getGet('categorie');

        $data = [
            'livres' => $this->livreModel->getLivresPagines($keyword, $categorie),
            'pager'  => $this->livreModel->pager,
            'search' => $keyword,
            'categorie'    => $categorie
        ];

        return view('livres/index', $data);
    }

    public function view($id = null)
    {
        $livre = $this->livreModel->find($id);

        if (!$livre) {
            throw PageNotFoundException::forPageNotFound("Ce livre n'existe pas.");
        }

        $data = [
            'livre'           => $livre,
            'dernierEmprunt' => $this->empruntModel->getDernierEmprunt($id)
        ];

        return view('livres/detail', $data);
    }

    public function create()
    {
        return view('livres/form');
    }

    public function store()
    {
        $postData = $this->request->getPost();
        $file = $this->request->getFile('couverture');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imgRules = [
                'couverture' => 'is_image[couverture]|mime_in[couverture,image/jpg,image/jpeg,image/png,image/webp]|max_size[couverture,2048]'
            ];

            if (!$this->validate($imgRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);
            $postData['couverture'] = $newName;
        }

     
        if (!$this->livreModel->insert($postData)) {
            return redirect()->back()->withInput()->with('errors', $this->livreModel->errors());
        }

        return redirect()->to('/livres')->with('success', 'Livre ajouté avec succès !');
    }


    public function delete($id)
    {
        if ($this->livreModel->delete($id)) {
            return redirect()->to('/livres')->with('success', 'Livre supprimé.');
        }
        return redirect()->back()->with('error', 'Impossible de supprimer ce livre.');
    }
}
