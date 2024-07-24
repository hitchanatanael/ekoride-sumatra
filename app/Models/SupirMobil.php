<?php

namespace App\Models;

use CodeIgniter\Model;

class SupirMobil extends Model
{
    protected $table            = 'supir_mobils';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_supir', 'id_mobil'];

    public function getIdSupirMobil($id)
    {
        return $this->select('supir_mobils.*, mobil.nama_mobil, supir.nama as nama_supir')
            ->join('mobil', 'mobil.id = supir_mobils.id_mobil')
            ->join('supir', 'supir.id = supir_mobils.id_supir')
            ->where('supir_mobils.id', $id)
            ->findAll();
    }
    public function getSupirMobil()
    {
        return $this->select('supir_mobils.*, mobil.nama_mobil, supir.nama as nama_supir, mobil.status')
            ->join('mobil', 'mobil.id = supir_mobils.id_mobil')
            ->join('supir', 'supir.id = supir_mobils.id_supir')
            ->findAll();
    }

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
