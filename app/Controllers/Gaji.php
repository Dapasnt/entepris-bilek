<?php

namespace App\Controllers;

use App\Models\GajiModel;

class Gaji extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->GajiModel = new GajiModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $gaji = $this->GajiModel->search($keyword);
        } else {
            $gaji = $this->GajiModel;
        }
        $data = [
            'title' => 'Daftar Gaji',
            'gaji' => $gaji->getGaji()
        ];
        return view('gol_gaji/index', $data);
    }

    public function tambah()
    {
        session();
        $data = ['title' => 'Tambah Data Gaji', 'error' => $this->validator == null ? [] :
            $this->validator->getErrors(),];
        return view('gol_gaji/tambah', $data);
    }
    public function simpan()
    {
        if (!$this->validate([
            'golongan' => [
                'rules' => 'required|is_unique[gol_gaji.golongan]',
                'errors' => [
                    'required' => 'golongan wajib di isi',
                    'is_unique' => 'golongan sudah ada'
                ]
            ]
        ])) {
            $data = [
                'title' => 'Tambah Gaji',
                'error' => $this->validator->getErrors()
            ];
            return view('gol_gaji/tambah', $data);
        }

        $this->GajiModel->insert([
            'golongan' => $this->request->getVar('golongan'),
            'gaji' => $this->request->getVar('gaji'),

        ]);
        session()->setFlashdata('pesan', 'Data Sudah berhasil ditambahkan');
        return redirect()->to('/gol_gaji');
    }
    public function hapus($gaji)
    {
        $this->GajiModel->delete($gaji);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');

        return redirect()->to('/gol_gaji');
    }
    public function ubah($gaji)
    {
        session();
        $data = [
            'title' => 'Ubah Data Gaji',
            'error' => $this->validator == null ? [] : $this->validator->getErrors(),
            'Gaji' => $this->GajiModel->getGaji($gaji)
        ];

        return view('gol_gaji/ubah', $data);
    }
    public function update($gaji)
    {

        $this->GajiModel->update($gaji, [
            'golongan' => $this->request->getVar('golongan'),
            'gaji' => $this->request->getVar('gaji'),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil diubah' );

        return redirect()->to('/gol_gaji');
    }

    public function detail($id)
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $gaji = $this->GajiModel->search($keyword);
        } else {
            $gaji = $this->GajiModel;
        }
        $data = [
            'title' => 'Daftar Gaji',
            'Gaji' => $gaji->getGaji($id)
        ];
        return view('gol_gaji/detail', $data);
    }
}
