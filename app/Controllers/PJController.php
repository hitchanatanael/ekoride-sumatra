<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mobil;
use App\Models\Nota;
use App\Models\Supir;
use App\Models\SupirMobil;
use App\Models\User;

class PJController extends BaseController
{
    protected $indexNotaModel;

    public function __construct()
    {
        $this->indexNotaModel = new Nota();
    }

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
        $modelUser  = new User();
        $modelNota  = new Nota();
        $modelMobil = new Mobil();

        $data = [
            'title'         => 'Dashboard',
            'userData'      => $modelUser->getJabatanById($id),
            'totalAcc'      => $modelNota->where('status', 'approved')->countAllResults(),
            'totalProgress' => $modelNota->where('status', 'progress')->countAllResults(),
            'totalReject'   => $modelNota->where('status', 'rejected')->countAllResults(),
            'mobilReady'    => $modelMobil->where('status', 0)->countAllResults(),
        ];

        return view('PJ/dashboard/index', $data);
    }

    public function nota_pj()
    {
        $model = new Nota();
        $notas = $model->notLike('status', 'pending')->findAll();

        foreach ($notas as &$nota) {
            $nota['formatted_tgl_surat'] = $this->formatTanggal($nota['tgl_surat']);
        }

        $data = [
            'title' => 'Nota Jalan',
            'model' => $notas
        ];

        return view('PJ/perjalanan/index', $data);
    }


    public function tambah($id)
    {
        $notaModel = new Nota();
        $supirMobilModel = new SupirMobil();
        $data = [
            'title'       => 'Tambah Nota Jalan',
            'model'       => $notaModel->where('id', $id)->first(),
            'supir_mobil' => $supirMobilModel->getSupirMobil()
        ];

        return view('PJ/perjalanan/tambah', $data);
    }

    public function tambah_save($id)
    {
        $rules = [
            'jml_orang' => [
                'label' => 'Jumlah Orang',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.',
                ]
            ],
            'tambahan' => [
                'label' => 'Tambahan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.',
                ]
            ],
            'id_supir_mobil' => [
                'label' => 'Supir-Mobil',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.'
                ]
            ]
        ];

        $data = $this->request->getPost(array_keys($rules));

        if (!$this->validateData($data, $rules)) {
            $errors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $notaModel = new Nota();
        $notaData = [
            'id'              => $id,
            'lokasi_kegiatan' => $this->request->getPost('lokasi_kegiatan'),
            'jml_orang'       => $this->request->getPost('jml_orang'),
            'tambahan'        => $this->request->getPost('tambahan'),
            'id_supir_mobil'  => $this->request->getPost('id_supir_mobil')
        ];

        // Simpan data nota
        $notaModel->save($notaData);

        // Update status mobil menjadi '1'
        $modelMobil = new Mobil();
        $dataMobil = [
            'id' => $this->request->getPost('id_supir_mobil'),
            'status' => 1,
        ];
        $modelMobil->save($dataMobil);

        return redirect()->to(base_url('/nota_pj'));
    }


    public function view($id)
    {
        $model = new Nota();
        $supirMobilModel = new SupirMobil();
        $nota = $model->getNotaWithJabatan($id);

        $model->markBacaPJ($id);

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

        $data = [
            'title' => 'Detail Nota Jalan',
            'model' => $nota,
            'dataTanggal' => $notaTanggal,
            'supir_mobil' => $supirMobilData,
            'nota_jalan_exists' => !empty($nota['jml_orang'])
        ];

        return view('PJ/perjalanan/view', $data);
    }

    public function history()
    {
        $modelHistory = new Nota();
        $notas = $modelHistory
            ->join('supir_mobils', 'supir_mobils.id=nota.id_supir_mobil')
            ->join('mobil', 'mobil.id=supir_mobils.id_mobil')
            ->join('supir', 'supir.id=supir_mobils.id_supir')
            ->where('nota.status', 'approved')
            ->findAll();

        foreach ($notas as &$nota) {
            $nota['formatted_tgl_mulai'] = $this->formatTanggal($nota['tgl_mulai']);
            $nota['formatted_tgl_selesai'] = $this->formatTanggal($nota['tgl_selesai']);
        }

        $data = [
            'title' => 'Riwayat Perjalanan',
            'modelHistory' => $notas,
        ];

        return view('PJ/perjalanan/history', $data);
    }

    public function dinas_selesai($id)
    {
        // Dapatkan detail nota berdasarkan ID
        $notaModel = new Nota();
        $nota = $notaModel->find($id);

        if ($nota) {
            // Dapatkan ID supir-mobil dari nota
            $id_supir_mobil = $nota['id_supir_mobil'];

            // Dapatkan detail supir-mobil
            $supirMobilModel = new SupirMobil();
            $supirMobil = $supirMobilModel->find($id_supir_mobil);

            if ($supirMobil) {
                // Dapatkan ID mobil dari supir-mobil
                $id_mobil = $supirMobil['id_mobil'];

                // Perbarui status mobil menjadi 0
                $modelMobil = new Mobil();
                $modelMobil->update($id_mobil, ['status' => 0]);
            }
        }

        return redirect()->to(base_url('/nota_pj/riwayat/'));
    }
}
