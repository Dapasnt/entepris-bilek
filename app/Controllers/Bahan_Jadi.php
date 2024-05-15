<?php

namespace App\Controllers;

use App\Models\BahanJadiModel;

class Bahan_Jadi extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->BahanJadiModel = new BahanJadiModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $bahan_jadi = $this->BahanJadiModel->search($keyword);
        } else {
            $bahan_jadi = $this->BahanJadiModel;
        }
        $data = [
            'title' => 'Daftar Bahan Jadi',
            'bahan_jadi' => $bahan_jadi->getBahanJadi()
        ];
        return view('bahan_jadi/index', $data);
    }
    public function tambah()
    {
        session();
        $data = ['title' => 'Tambah Bahan Jadi', 'error' => $this->validator == null ? [] :
            $this->validator->getErrors(),];
        return view('bahan_jadi/tambah', $data);
    }
    public function simpan()
    {
        // if (!$this->validate([
        //     'kode_bahanjadi' => [
        //         'rules' => 'required|is_unique[bahan_jadi.kode_bahan_jadi]',
        //         'errors' => [
        //             'required' => 'kode bahan jadi wajib di isi',
        //             'is_unique' => 'kode bahan jadi sudah ada'
        //         ]
        //     ]
        // ])) {
        //     $data = [
        //         'title' => 'Tambah Bahan Jadi',
        //         'error' => $this->validator->getErrors()
        //     ];
        //     return view('/bahan_jadi/tambah', $data);
        // }

        $this->BahanJadiModel->insert([
            'kode_bahanjadi' => $this->request->getVar('kode_bahan_jadi'),
            'nama_produksi' => $this->request->getVar('nama_produksi'),
            'tanggal_produksi' => $this->request->getVar('tanggal_produksi')
        ]);
        session()->setFlashdata('pesan', 'Data Sudah berhasil ditambahkan');
        return redirect()->to('bahan_jadi/index');
    }
    public function hapus($bahan_jadi)
    {
        $this->BahanJadiModel->delete($bahan_jadi);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');

        return redirect()->to('/Bahan_Jadi');
    }
    public function ubah($bahan_jadi)
    {
        session();
        $data = [
            'title' => 'Ubah Data Bahan Jadi',
            'error' => $this->validator == null ? [] : $this->validator->getErrors(),
            'bahan_jadi' => $this->BahanJadiModel->getBahanJadi($bahan_jadi)
        ];

        return view('/bahan_jadi/ubah', $data);
    }
    public function update($bahan_jadi)
    {

        $this->BahanJadiModel->update($bahan_jadi, [
            'kode_bahanjadi' => $this->request->getVar('kode_bahanjadi'),
            'nama_produksi' => $this->request->getVar('nama_produksi'),
            'tanggal_produksi' => $this->request->getVar('tanggal_produksi')

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil diubah');

        return redirect()->to('/Bahan_Jadi');
    }
    public function detail($id)
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $bahan_jadi = $this->BahanjadiModel->search($keyword);
        } else {
            $bahan_jadi = $this->BahanJadiModel;
        }
        $data = [
            'title' => 'Daftar Bahan Jadi',
            'bahan_jadi' => $bahan_jadi->getBahanJadi($id)
        ];
        return view('bahan_jadi/detail', $data);
    }
}
