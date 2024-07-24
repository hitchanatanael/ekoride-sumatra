<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mobil;

class MobilController extends BaseController
{
    public function index()
    {
        $model = new Mobil();
        $data = [
            'title' => 'Data Mobil',
            'model' => $model->findAll(),
        ];

        return view('Admin/mobil/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Mobil',
        ];

        return view('Admin/mobil/tambah', $data);
    }

    public function store()
    {
        $model = new Mobil();

        $rules = [
            'nama_mobil' => [
                'label' => 'Nama Mobil',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.'
                ]
            ],

            'plat' => [
                'label' => 'Plat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} tidak boleh kosong.'
                ]
            ],

            'foto_mobil' => [
                'rules'  => 'max_size[foto_mobil,2000]|is_image[foto_mobil]|mime_in[foto_mobil,image/jpg,image/jpeg,image/png,image/heif,image/heic]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'  => 'Yang anda pilih bukan gambar'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $fotoMobil = $this->request->getFile('foto_mobil');

        //cek apakah ada foto yang diupload
        if ($fotoMobil->getError() == 4) {
            $fotoPath = 'default.jpg';
        } else {
            $fotoPath = $fotoMobil->getRandomName();
            $fotoMobil->move('uploads/', $fotoPath);
        }

        $data = [
            'nama_mobil' => $this->request->getVar('nama_mobil'),
            'plat' => $this->request->getVar('plat'),
            'foto_mobil' => $fotoPath
        ];


        if ($model->save($data)) {
            session()->setFlashdata('tambahSuccess', 'Data mobil berhasil ditambahkan');
            return redirect()->back();
        } else {
            session()->setFlashdata('tambahErrors', 'Gagal menambah data mobil');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $model = new Mobil();
        $data = [
            'title' => 'Edit Data Mobil',
            'mobil' => $model->find($id)
        ];

        return view('Admin/mobil/edit', $data);
    }

    public function edit_save($id)
    {
        $model = new Mobil();
        $fotoMobil = $this->request->getFile('foto_mobil');
        if ($fotoMobil && $fotoMobil->isValid() && !$fotoMobil->hasMoved()) {
            $rules = [
                'foto_mobil' => [
                    'rules'  => 'uploaded[foto_mobil]|max_size[foto_mobil,2000]|is_image[foto_mobil]|mime_in[foto_mobil,image/jpg,image/jpeg,image/png,image/heif,image/heic]',
                    'errors' => [
                        'uploaded' => 'Pilih gambar terlebih dahulu',
                        'max_size' => 'Ukuran foto terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in'  => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ];

            if (!$this->validate($rules)) {
                $errors = $this->validator->getErrors();
                return redirect()->back()->withInput()->with('errors', $errors);
            }

            $fotoPath = $fotoMobil->getRandomName();
            $fotoMobil->move('uploads/', $fotoPath);

            $data = [
                'nama_mobil' => $this->request->getVar('nama_mobil'),
                'plat' => $this->request->getVar('plat'),
                'foto_mobil' => $fotoPath
            ];
        } else {
            $data = [
                'nama_mobil' => $this->request->getVar('nama_mobil'),
                'plat' => $this->request->getVar('plat')
            ];
        }

        if ($model->update($id, $data)) {
            session()->setFlashdata('editSuccess', 'Data mobil berhasil diperbarui');
            return redirect()->to(base_url('/mobil'));
        } else {
            session()->setFlashdata('editErrors', 'Gagal memperbarui data mobil');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $model = new Mobil();
        $fotoMobil = $model->find($id);

        if ($fotoMobil['foto_mobil'] != 'default.jpg') {
            if (file_exists('uploads/' . $fotoMobil['foto_mobil'])) {
                unlink('uploads/' . $fotoMobil['foto_mobil']);
            }
        }
        $model->delete($id);

        return redirect()->to(base_url('/mobil'));
    }
}
