<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class ProfilController extends BaseController
{
    public function index($id)
    {
        $id = session()->get('id');

        $model = new User();
        $data = [
            'title' => 'Edit Profile',
            'userData' => $model->getJabatanById($id),
        ];

        return view('profil/index', $data);
    }

    public function ubahPassword($id)
    {
        $id = session()->get('id');

        $model = new User();
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash((string) $this->request->getPost('password'), PASSWORD_BCRYPT) // Hash password sebelum menyimpan
        ];

        $model->update($id, $data);

        $user = $model->getUserById($id);

        if ($user) {
            switch ($user['nama_role']) {
                case 'admin':
                    session()->setFlashdata('profileSuccess', 'Berhasil mengubah profil.');
                    return redirect()->to(base_url('/dashboard'));
                case 'peminjam':
                    session()->setFlashdata('profileSuccess', 'Berhasil mengubah profil.');
                    return redirect()->to(base_url('/peminjam'));
                case 'kabag':
                    session()->setFlashdata('profileSuccess', 'Berhasil mengubah profil.');
                    return redirect()->to(base_url('/kabag'));
                case 'pj':
                    session()->setFlashdata('profileSuccess', 'Berhasil mengubah profil.');
                    return redirect()->to(base_url('/pj'));
                default:
                    session()->setFlashdata('error', 'Role pengguna tidak valid.');
                    return redirect()->to(base_url('/login'));
            }
        } else {
            session()->setFlashdata('error', 'Pengguna tidak ditemukan.');
            return redirect()->to(base_url('/login'));
        }
    }
}
