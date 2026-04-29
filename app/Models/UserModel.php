<?php 
namespace App\models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nom', 'email', 'mot_de_passe', 'role'];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    protected $validationRules =[
        'nom' => 'required|min_length[3]',
        'email' => 'required|valid_email|is_unique[utilisateurs.email,id,{id}]',
        'mot_de_passe' => 'required|min_length[6]',
        'role' => 'in_list[admin,utilisateur]'
    ];

    protected $validationMessages = [
        'nom' => [
            'required' => 'Le nom est obligatoire.',
            'min_length' => 'Le nom doit contenir au moins 3 caractères.'
        ],
        'email' => [
            'required' => 'L\'email est obligatoire.',
            'valid_email' => 'Veuillez fournir une adresse email valide.',
            'is_unique' => 'Cet email est déjà utilisé.'
        ],
        'mot_de_passe' => [
            'required' => 'Le mot de passe est obligatoire.',
            'min_length' => 'Le mot de passe doit contenir au moins 6 caractères.'
        ],
        'role' => [
            'in_list' => 'Le rôle doit être soit "admin" soit "utilisateur".'
        ]
    ];

    



}