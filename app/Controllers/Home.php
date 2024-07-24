<?php

namespace App\Controllers;

use App\Models\Mobil;
use App\Models\Supir;
use App\Models\User;

class Home extends BaseController
{
    public function index()
    {
        $id = session()->get('id');
        $modelUser = new User();
        $modelMobil = new Mobil();
        $modelSupir = new Supir();

        $data = [
            'title' => 'Dashboard',
            'userData' => $modelUser->getJabatanById($id),
            'totalKabid' => $modelUser->whereIn('id_jabatan', [4, 5, 6])->countAllResults(),
            'totalPJ'    => $modelUser->whereIn('id_jabatan', [7, 8])->countAllResults(),
            'totalMobil' => $modelMobil->countAllResults(),
            'totalSupir' => $modelSupir->countAllResults(),
        ];
        return view('Admin/dashboard/index', $data);
    }
}
