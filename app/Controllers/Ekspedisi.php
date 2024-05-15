<?php

namespace App\Controllers;

use App\Models\EkspedisiModel;

class Ekspedisi extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->EkspedisiModel = new EkspedisiModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $ekspedisi = $this->EkspedisiModel->search($keyword);
        } else {
            $ekspedisi = $this->EkspedisiModel;
        }
        $data = [
            'title' => 'Daftar Ekspedisi',
            'ekspedisi' => $ekspedisi->getEkspedisi()
        ];
        return view('ekspedisi/index', $data);
    }
    public function tambah()
    {
        session();
        $data = ['title' => 'Tambah Ekspedisi', 'error' => $this->validator == null ? [] :
            $this->validator->getErrors(),];
        return view('ekspedisi/tambah', $data);
    }
    public function simpan()
    {
        if (!$this->validate([
            'kode_ekspedisi' => [
                'rules' => 'required|is_unique[ekspedisi.kode_ekspedisi]',
                'errors' => [
                    'required' => 'kode ekspedisi wajib di isi',
                    'is_unique' => 'kode ekspedisi sudah ada'
                ]
            ]
        ])) {
            $data = [
                'title' => 'Tambah Ekspedisi',
                'error' => $this->validator->getErrors()
            ];
            return view('ekspedisi/tambah', $data);
        }

        $this->EkspedisiModel->insert([
            'kode_ekspedisi' => $this->request->getVar('kode_ekspedisi'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'alamat' => $this->request->getVar('alamat'),
            'hp' => $this->request->getVar('hp')
        ]);
        session()->setFlashdata('pesan', 'Data Sudah berhasil ditambahkan');
        return redirect()->to('/ekspedisi');
    }
    public function hapus($ekspedisi)
    {

        $this->EkspedisiModel->delete($ekspedisi);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');

        return redirect()->to('/ekspedisi');
    }
    public function ubah($ekspedisi)
    {
        session();
        $data = [
            'title' => 'Ubah Data Ekspedisi',
            'error' => $this->validator == null ? [] : $this->validator->getErrors(),
            'ekspedisi' => $this->EkspedisiModel->getEkspedisi($ekspedisi)
        ];

        return view('ekspedisi/ubah', $data);
    }
    public function update($ekspedisi)
    {

        $this->EkspedisiModel->update($ekspedisi, [
            'kode_ekspedisi' => $this->request->getVar('kode_ekspedisi'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'alamat' => $this->request->getVar('alamat'),
            'hp' => $this->request->getVar('hp')

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil diubah');

        return redirect()->to('/ekspedisi');
    }
    public function detail($id)
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $ekspedisi = $this->EkspedisiModel->search($keyword);
        } else {
            $ekspedisi = $this->EkspedisiModel;
        }
        $data = [
            'title' => 'Daftar Ekspedisi',
            'ekspedisi' => $ekspedisi->getEkspedisi($id)
        ];
        return view('ekspedisi/detail', $data);
    }
}
