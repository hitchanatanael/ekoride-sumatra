<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Jabatan;
use App\Models\Pegawai;

class PegawaiController extends BaseController
{
    public function index()
    {
        $model = new Pegawai();
        $data = [
            'title' => 'Data Pegawai',
            'model' => $model->getJabatan()
        ];

        return view('Admin/pegawai/index', $data);
    }

    public function tambah()
    {
        $model = new Jabatan();
        $data = [
            'title'   => 'Tambah Data Pegawai',
            'jabatan' => $model->findAll()
        ];

        return view('Admin/pegawai/tambah', $data);
    }

    public function tambah_save()
    {
        $model = new Pegawai();

        $rules = [
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.'
                ]
            ],

            'nip' => [
                'label' => 'NIP',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.'
                ]
            ],

            'jabatan' => [
                'label' => 'Jabatan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = [
            'nama'    => $this->request->getPost('nama'),
            'nip'     => $this->request->getPost('nip'),
            'id_jabatan' => $this->request->getPost('jabatan')
        ];

        if ($model->save($data)) {
            session()->setFlashdata('tambahSuccess', 'Data pegawai berhasil ditambahkan');
            return redirect()->back();
        } else {
            session()->setFlashdata('tambahErrors', 'Gagal menambah data pegawai');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $model = new Pegawai();
        $jabatanModel = new Jabatan();
        $data = [
            'title'   => 'Edit Data Pegawai',
            'pegawai' => $model->join('jabatan', 'jabatan.id=pegawai.id_jabatan')->find($id),
            'jabatan' => $jabatanModel->findAll(),
        ];

        return view('Admin/pegawai/edit', $data);
    }

    public function edit_save($id)
    {
        $model = new Pegawai();
        $data = [
            'nama'    => $this->request->getPost('nama'),
            'nip'     => $this->request->getPost('nip'),
            'id_jabatan' => $this->request->getPost('jabatan')
        ];

        if ($model->update($id, $data)) {
            session()->setFlashdata('editSuccess', 'Data pegawai berhasil diperbarui');
            return redirect()->to(base_url('/pegawai'));
        } else {
            session()->setFlashdata('editErrors', 'Gagal memperbarui data pegawai');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $model = new Pegawai();
        $model->delete($id);

        return redirect()->to(base_url('/pegawai'));
    }
}
