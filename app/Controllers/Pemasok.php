<?php

namespace App\Controllers;

use App\Models\PemasokModel;

class Pemasok extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->PemasokModel = new PemasokModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $pemasok = $this->PemasokModel->search($keyword);
        } else {
            $pemasok = $this->PemasokModel;
        }
        $data = [
            'title' => 'Daftar Pemasok',
            'pemasok' => $pemasok->getPemasok()
        ];
        return view('pemasok/index', $data);
    }
    public function tambah()
    {
        session();
        $data = ['title' => 'Tambah Pemasok', 'error' => $this->validator == null ? [] :
            $this->validator->getErrors(),];
        return view('pemasok/tambah', $data);
    }
    public function simpan()
    {
        if (!$this->validate([
            'kode_pemasok' => [
                'rules' => 'required|is_unique[pemasok.kode_pemasok]',
                'errors' => [
                    'required' => 'kode pemasok wajib di isi',
                    'is_unique' => 'kode pemasok sudah ada'
                ]
            ]
        ])) {
            $data = [
                'title' => 'Tambah Pemasok',
                'error' => $this->validator->getErrors()
            ];
            return view('pemasok/tambah', $data);
        }

        $this->PemasokModel->insert([
            'kode_pemasok' => $this->request->getVar('kode_pemasok'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),

        ]);
        session()->setFlashdata('pesan', 'Data Sudah berhasil ditambahkan');
        return redirect()->to('/pemasok');
    }
    public function hapus($pemasok)
    {

        $this->PemasokModel->delete($pemasok);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');

        return redirect()->to('/pemasok');
    }
    public function ubah($pemasok)
    {
        session();
        $data = [
            'title' => 'Ubah Data Pemasok',
            'error' => $this->validator == null ? [] : $this->validator->getErrors(),
            'pemasok' => $this->PemasokModel->getPemasok($pemasok)
        ];

        return view('pemasok/ubah', $data);
    }
    public function update($pemasok)
    {

        $this->PemasokModel->update($pemasok, [
            'kode_pemasok' => $this->request->getVar('kode_pemasok'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'tanggal_barang' => $this->request->getVar('tanggal_barang'),


        ]);
        session()->setFlashdata('pesan', 'Data Berhasil diubah');

        return redirect()->to('/pemasok');
    }

    public function detail($id)
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $pemasok = $this->PemasokModel->search($keyword);
        } else {
            $pemasok = $this->PemasokModel;
        }
        $data = [
            'title' => 'Daftar Pemasok',
            'pemasok' => $pemasok->getPemasok($id)
        ];
        return view('pemasok/detail', $data);
    }
}
