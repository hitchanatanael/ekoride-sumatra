<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Supir;

class SupirController extends BaseController
{
    public function index()
    {
        $model = new Supir();
        $data = [
            'title' => 'Data Supir',
            'model' => $model->findAll(),
        ];

        return view('Admin/supir/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Supir',
        ];

        return view('Admin/supir/tambah', $data);
    }

    public function store()
    {
        $model = new Supir();

        $rules = [
            'nama' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $error = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $error);
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'no_hp' => $this->request->getPost('no_hp')
        ];

        if ($model->save($data)) {
            session()->setFlashdata('tambahSuccess', 'Data supir berhasil ditambahkan');
            return redirect()->back();
        } else {
            session()->setFlashdata('tambahErrors', 'Gagal menambah data supir');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $model = new Supir();
        $data = [
            'title' => 'Edit Data Supir',
            'supir' => $model->find($id),
        ];

        return view('Admin/supir/edit', $data);
    }

    public function edit_save($id)
    {
        $model = new Supir();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'no_hp' => $this->request->getPost('no_hp')
        ];

        if ($model->update($id, $data)) {
            session()->setFlashdata('editSuccess', 'Data supir berhasil diperbarui');
            return redirect()->to(base_url('/supir'));
        } else {
            session()->setFlashdata('editErrors', 'Gagal memperbarui data supir');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $model = new Supir();
        $model->delete($id);

        return redirect()->to(base_url('/supir'));
    }
}
