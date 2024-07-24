<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['nama', 'email', 'password', 'foto_user', 'id_jabatan', 'role_id'];

    public function getUsersWithActiveRolesAndJabatan()
    {
        return $this->select('users.*, roles.role as nama_role, jabatan.jabatan as nama_jabatan')
            ->join('roles', 'roles.id = users.role_id')
            ->join('jabatan', 'jabatan.id = users.id_jabatan')
            ->notLike('roles.role', 'admin')
            ->notLike('jabatan.jabatan', 'Admin')
            ->findAll();
    }

    public function getUserById($id)
    {
        return $this->select('users.*, roles.role as nama_role, jabatan.jabatan as nama_jabatan')
            ->join('roles', 'roles.id = users.role_id')
            ->join('jabatan', 'jabatan.id = users.id_jabatan')
            ->where('users.id', $id)
            ->first();
    }

    public function getJabatanById($id)
    {
        return $this->select('users.*, jabatan.jabatan as nama_jabatan')
            ->join('jabatan', 'jabatan.id = users.id_jabatan')
            ->where('users.id', $id)
            ->first();
    }

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
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
