<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Jabatan;
use App\Models\Nota;
use App\Models\SupirMobil;
use App\Models\User;

class PeminjamController extends BaseController
{
    private function formatTanggal($tanggal)
    {
        $bulan = [
            1  => 'Januari',
            2  => 'Februari',
            3  => 'Maret',
            4  => 'April',
            5  => 'Mei',
            6  => 'Juni',
            7  => 'Juli',
            8  => 'Agustus',
            9  => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $date = new \DateTime($tanggal);
        $day = $date->format('d');
        $month = (int)$date->format('m');
        $year = $date->format('Y');

        return $day . ' ' . $bulan[$month] . ' ' . $year;
    }

    public function index()
    {
        $id = session()->get('id');
        $modelUser = new User();
        $modelNota = new Nota();

        $data = [
            'title'         => 'Dashboard',
            'userData'      => $modelUser->getJabatanById($id),
            'totalAcc'      => $modelNota->where('id_user', $id)->where('status', 'approved')->countAllResults(),
            'totalProgress' => $modelNota->where('id_user', $id)->where('status', 'progress')->countAllResults(),
            'totalReject'   => $modelNota->where('id_user', $id)->where('status', 'rejected')->countAllResults(),
        ];

        return view('Peminjam/dashboard/index', $data);
    }


    public function nota_peminjam()
    {
        $id = session()->get('id');

        $model = new Nota();
        $notas = $model->where('id_user', $id)->findAll();

        foreach ($notas as &$nota) {
            $nota['formatted_tgl_surat'] = $this->formatTanggal($nota['tgl_surat']);
        }

        $data = [
            'title' => 'Nota Peminjam',
            'model' => $notas
        ];

        return view('Peminjam/nota/index', $data);
    }

    public function tambah()
    {
        $id = session()->get('id');
        $model = new User();
        $userData = $model->getJabatanById($id);

        $model = new Jabatan();
        $kabag = $model->find(2);
        $data = [
            'title'   => 'Tambah Nota',
            'kabag'   => $kabag,
            'jabatan' => $model->findAll(),
            'userData' => $userData,
        ];

        return view('Peminjam/nota/tambah', $data);
    }

    public function tambah_save()
    {
        $rules = [
            'no_dinas' => [
                'label' => 'Peminjam',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.'
                ]
            ],
            'peminjam' => [
                'label' => 'Peminjam',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.'
                ]
            ],
            'kabag' => [
                'label' => 'Kabag',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.'
                ]
            ],
            'hal' => [
                'label' => 'Hal',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.'
                ]
            ],
            'lampiran' => [
                'label' => 'Lampiran',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.'
                ]
            ],
            'tgl_surat' => [
                'label' => 'Tanggal Surat',
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.',
                    'valid_date' => 'Kolom {field} harus berisi tanggal yang valid.'
                ]
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.'
                ]
            ],
            'lokasi_kegiatan' => [
                'label' => 'Lokasi Kegiatan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.'
                ]
            ],
            'tgl_mulai' => [
                'label' => 'Tanggal Mulai',
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.',
                    'valid_date' => 'Kolom {field} harus berisi tanggal yang valid.'
                ]
            ],
            'tgl_selesai' => [
                'label' => 'Tanggal Selesai',
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.',
                    'valid_date' => 'Kolom {field} harus berisi tanggal yang valid.'
                ]
            ]
        ];

        $dataRule = $this->request->getPost(array_keys($rules));

        if (!$this->validateData($dataRule, $rules)) {
            $errors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $model = new Nota();
        $data = [
            'id_jabatan'      => $this->request->getPost('peminjam'),
            'no_dinas'        => $this->request->getPost('no_dinas'),
            'kabag'           => $this->request->getPost('kabag'),
            'hal'             => $this->request->getPost('hal'),
            'lampiran'        => $this->request->getPost('lampiran'),
            'tgl_surat'       => $this->request->getPost('tgl_surat'),
            'deskripsi'       => $this->request->getPost('deskripsi'),
            'lokasi_kegiatan' => $this->request->getPost('lokasi_kegiatan'),
            'tgl_mulai'       => $this->request->getPost('tgl_mulai'),
            'tgl_selesai'     => $this->request->getPost('tgl_selesai'),
            'id_user'         => session()->get('id'),
        ];

        if ($model->save($data)) {
            session()->setFlashdata('tambahSuccess', 'Nota berhasil dibuat');
            return redirect()->to(base_url('/nota_peminjam'));
        } else {
            session()->setFlashdata('tambahErrors', 'Gagal membuat nota');
            return redirect()->back()->withInput();
        }
    }

    public function view($id)
    {
        $model = new Nota();
        $supirMobilModel = new SupirMobil();
        $nota = $model->getNotaWithJabatan($id);

        $notaTanggal = [
            'tgl_surat'   => $this->formatTanggal($nota['tgl_surat']),
            'tgl_mulai'   => $this->formatTanggal($nota['tgl_mulai']),
            'tgl_selesai' => $this->formatTanggal($nota['tgl_selesai']),
        ];

        $supirMobilData = null;
        if (!empty($nota['id_supir_mobil'])) {
            $supirMobil = $supirMobilModel->getIdSupirMobil($nota['id_supir_mobil']);
            if (!empty($supirMobil)) {
                $supirMobilData = $supirMobil[0];
            }
        }

        $nota_jalan_exists = $model->where('status', 'approved')->findAll();

        $data = [
            'title' => 'Detail Nota Jalan',
            'model' => $nota,
            'dataTanggal' => $notaTanggal,
            'supir_mobil' => $supirMobilData,
            'nota_jalan_exists' => $nota_jalan_exists,
        ];
        return view('Peminjam/nota/view', $data);
    }
}
