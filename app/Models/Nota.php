<?php

namespace App\Models;

use CodeIgniter\Model;

class Nota extends Model
{
    protected $table            = 'nota';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user',
        'id_jabatan',
        'no_dinas',
        'kabag',
        'hal',
        'lampiran',
        'status',
        'tgl_surat',
        'deskripsi',
        'lokasi_kegiatan',
        'tgl_mulai',
        'tgl_selesai',
        'status',
        'jml_orang',
        'tambahan',
        'id_supir_mobil',
        'baca_kabag',
        'baca_pj',
    ];

    public function markBacaKabag($id)
    {
        return $this->update($id, ['baca_kabag' => true]);
    }

    public function markBacaPJ($id)
    {
        return $this->update($id, ['baca_pj' => true]);
    }

    public function getJabatan()
    {
        return $this->select('nota.*, jabatan.jabatan as jabatan_name')
            ->join('jabatan', 'jabatan.id = nota.id_jabatan')
            ->findAll();
    }

    public function getNotaWithJabatan($id)
    {
        return $this->select('nota.*, jabatan.jabatan as jabatan_name')
            ->join('jabatan', 'jabatan.id = nota.id_jabatan')
            ->where('nota.id', $id)
            ->first();
    }

    public function getSupirMobil()
    {
        return $this->select('nota.*, supir_mobils.id, supir_mobils.id_mobil')
            ->join('supir_mobils', 'supir_mobils.id = nota.id_supir_mobil')
            ->findAll();
    }

    public function getTanggalSelesai($id)
    {
        return $this->select('tgl_selesai')->where('id', $id)->first();
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
