<?php

namespace App\Models;

use CodeIgniter\Model;

class LivreModel extends Model
{
    protected $table      = 'livres';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'titre', 'auteur', 'isbn', 'annee_publication',
        'categorie', 'resume', 'couverture', 'statut'
    ];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'titre'             => 'required|min_length[3]',
        'auteur'            => 'required',
        'isbn'              => 'required|is_unique[livres.isbn,id,{id}]',
        'annee_publication' => 'required|check_year_not_future'
    ];

    protected $validationMessages = [
        'titre' => [
            'required'   => 'Le titre du livre est obligatoire.',
            'min_length' => 'Le titre doit contenir au moins 3 caractères.'
        ],
        'auteur' => [
            'required'   => 'Le nom de l\'auteur est obligatoire.'
        ],
        'isbn' => [
            'required'  => 'Le code ISBN est obligatoire.',
            'is_unique' => 'Cet ISBN existe déjà dans notre base de données.'
        ],
        'annee_publication' => [
            'required'               => 'L\'année de publication est obligatoire.',
            'check_year_not_future'  => 'L\'année de publication ne peut pas être dans le futur.'
        ]
    ];

   
    public function check_year_not_future(string $str): bool
    {
        $currentYear = date('Y');
        return (int)$str <= (int)$currentYear;
    }

    public function getLivresPagines(?string $keyword = null, ?string $categorie = null)
    {
        if (!empty($keyword)) {
            $this->like('titre', $keyword);
        }
        if (!empty($categorie)) {
            $this->where('categorie', $categorie);
        }
        return $this->paginate(10);
    }
}
