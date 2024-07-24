<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Role;

class LoginController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'nama'  => session()->get('nama'),
        ];

        return view('login/index', $data);
    }

    public function loginProses()
    {
        $model = new User();
        $roleModel = new Role();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Email dan password wajib diisi.');
            return redirect()->back()->withInput();
        }

        if (!is_string($email) || !is_string($password)) {
            session()->setFlashdata('error', 'Email dan Password salah!');
            return redirect()->to(base_url('/login'));
        }

        $user = $model->where('email', $email)->first();
        if (is_null($user) || !password_verify($password, $user['password'])) {
            session()->setFlashdata('error', 'Email atau password salah.');
            return redirect()->to(base_url('/login'));
        }

        $role = $roleModel->find($user['role_id']);

        if (is_null($role)) {
            session()->setFlashdata('error', 'Role pengguna tidak valid.');
            return redirect()->to(base_url('/login'));
        }

        session()->set([
            'id' => $user['id'],
            'email' => $user['email'],
            'nama' => $user['nama'],
            'role' => $role['role'],
            'isLoggedIn' => true
        ]);

        switch ($role['role']) {
            case 'admin':
                return redirect()->to(base_url('/dashboard'));
            case 'peminjam':
                return redirect()->to(base_url('/peminjam'));
            case 'kabag':
                return redirect()->to(base_url('/kabag'));
            case 'pj':
                return redirect()->to(base_url('/pj'));
            default:
                session()->setFlashdata('error', 'Role pengguna tidak valid.');
                return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
