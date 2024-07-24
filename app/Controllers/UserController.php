<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Jabatan;
use App\Models\User;
use App\Models\Role;

class UserController extends BaseController
{
    public function index()
    {
        $model = new User();
        $data = [
            'title' => 'Akun User',
            'model' => $model->getUsersWithActiveRolesAndJabatan()
        ];

        return view('Admin/users/index', $data);
    }

    public function tambah()
    {
        $roleModel = new Role();
        $jabatanModel = new Jabatan();
        $data = [
            'title'   => 'Tambah Akun User',
            'roles'   => $roleModel->notLike('role', 'admin')->findAll(),
            'jabatans' => $jabatanModel->notLike('jabatan', 'Admin')->findAll()
        ];

        return view('Admin/users/tambah', $data);
    }

    public function tambah_save()
    {
        $model = new User();
        $rules = [
            'nama' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong'
                ]
            ],

            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong',
                    'valid_email' => 'Kolom {field} harus berupa email yang valid'
                ]
            ],

            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|max_length[255]|min_length[8]',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong',
                    'min_length' => '{field} terlalu singkat. Minimal 8 karakter',
                ]
            ],

            'jabatan' => [
                'label'  => 'Jabatan',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong',
                ]
            ],

            'role' => [
                'label'  => 'Role',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $error = $this->validator->getErrors();
            session()->setFlashdata('errors', $error);
            return redirect()->back()->withInput()->with('errors', $error);
        }

        $data = [
            'nama'       => $this->request->getVar('nama'),
            'email'      => $this->request->getVar('email'),
            'password'   => password_hash((string) $this->request->getVar('password'), PASSWORD_BCRYPT),
            'id_jabatan' => $this->request->getVar('jabatan'),
            'role_id'    => $this->request->getVar('role'),
        ];

        if ($model->save($data)) {
            session()->setFlashdata('tambahSuccess', 'Data user berhasil ditambahkan');
            return redirect()->back();
        } else {
            session()->setFlashdata('tambahErrors', 'Gagal menambah data user');
            return redirect()->back()->withInput();
        }
    }


    public function edit($id)
    {
        $userModel = new User();
        $roleModel = new Role();
        $jabatanModel = new Jabatan();

        $data = [
            'title' => 'Edit Data User',
            'user' =>  $userModel->getUserById($id),
            'jabatans' => $jabatanModel->notLike('jabatan', 'Admin')->findAll(),
            'roles' => $roleModel->notLike('role', 'admin')->findAll(),
        ];

        return view('Admin/users/edit', $data);
    }

    public function edit_save($id)
    {
        $model = new User();

        $password = $this->request->getVar('password');
        $data = [
            'nama'       => $this->request->getPost('nama'),
            'email'      => $this->request->getPost('email'),
            'id_jabatan' => $this->request->getPost('jabatan'),
            'role_id'    => $this->request->getPost('role')
        ];

        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_BCRYPT);
        }

        if ($model->update($id, $data)) {
            session()->setFlashdata('editSuccess', 'Data user berhasil diperbarui');
            return redirect()->to(base_url('/users'));
        } else {
            session()->setFlashdata('editErrors', 'Gagal memperbarui data user');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $model = new User();
        $model->delete($id);

        return redirect()->to(base_url('/users'));
    }
}
