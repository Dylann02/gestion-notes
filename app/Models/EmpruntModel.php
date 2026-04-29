<?php
namespace App\Models;

use CodeIgniter\Model;

class EmpruntModel extends Model
{
    protected $table      = 'emprunts';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'livre_id',
        'date_emprunt',
        'date_retour'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDernierEmprunt(int $livreId){
        return $this->where('livre_id',$livreId)
                    ->orderBy('date_emprunt','DESC')
                    ->first();
    }



}

