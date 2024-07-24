<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Nota;
use App\Models\SupirMobil;
use App\Models\User;

class KabagController extends BaseController
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
        $modelUser = new User();
        $modelNota = new Nota();

        $data = [
            'title'        => 'Dashboard',
            'userData'     => $modelUser->getJabatanById($id),
            'totalNota'    => $modelNota->countAllResults(),
            'notaProgress' => $modelNota->where('status', 'progress')->countAllResults(),
            'notaReject'   => $modelNota->where('status', 'rejected')->countAllResults(),
        ];

        return view('Kabag/dashboard/index', $data);
    }

    public function surat_masuk()
    {
        $model = new Nota();
        $notas = $model->findAll();

        foreach ($notas as &$nota) {
            $nota['formatted_tgl_surat'] = $this->formatTanggal($nota['tgl_surat']);
        }

        $data = [
            'title' => 'Surat Masuk',
            'model' => $notas,
        ];

        return view('Kabag/surat-masuk/index', $data);
    }

    public function generatePdf($id)
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

        $path = FCPATH . 'assets/img/logo_klhk.png';
        $imageData = base64_encode(file_get_contents($path));
        $src = 'data:image/png;base64,' . $imageData;

        $data = [
            'title' => 'Detail Nota Jalan',
            'model' => $nota,
            'dataTanggal' => $notaTanggal,
            'supir_mobil' => $supirMobilData,
            'nota_jalan_exists' => !empty($nota['jml_orang']),
            'image_src' => $src,
        ];

        $html = view('Kabag/surat-masuk/pdf_view', $data);
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('laporan.pdf', array("Attachment" => false));
    }

    public function view($id)
    {
        $model = new Nota();
        $nota = $model->getNotaWithJabatan($id);
        $model->markBacaKabag($id);

        $supirMobilModel = new SupirMobil();

        $notaTanggal = [
            'tgl_surat'   => isset($nota['tgl_surat']) ? $this->formatTanggal($nota['tgl_surat']) : '',
            'tgl_mulai'   => isset($nota['tgl_mulai']) ? $this->formatTanggal($nota['tgl_mulai']) : '',
            'tgl_selesai' => isset($nota['tgl_selesai']) ? $this->formatTanggal($nota['tgl_selesai']) : '',
        ];

        $supirMobilData = null;
        if (!empty($nota['id_supir_mobil'])) {
            $supirMobil = $supirMobilModel->getIdSupirMobil($nota['id_supir_mobil']);
            if (!empty($supirMobil)) {
                $supirMobilData = $supirMobil[0];
            }
        }

        $data = [
            'title' => 'Detail Nota',
            'model' => $nota,
            'dataTanggal' => $notaTanggal,
            'supir_mobil' => $supirMobilData,
            'nota_jalan_exists' => !empty($nota['jml_orang'])
        ];

        return view('Kabag/surat-masuk/view', $data);
    }

    public function progress($id)
    {
        $model = new Nota();
        $model->update($id, ['status' => 'progress']);

        return redirect()->to(base_url('/surat_masuk/view/' . $id));
    }

    public function approve($id)
    {
        $model = new Nota();
        $model->update($id, ['status' => 'approved']);

        return redirect()->to(base_url('/surat_masuk/view/' . $id));
    }

    public function reject($id)
    {
        $model = new Nota();
        $model->update($id, ['status' => 'rejected']);

        return redirect()->to(base_url('/surat_masuk/view/' . $id));
    }
}
