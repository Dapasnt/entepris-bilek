<?php

namespace App\Controllers;

use App\Models\Bahan_BakuModel;

class Bahan_Baku extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->Bahan_BakuModel = new Bahan_BakuModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $bahan_baku = $this->Bahan_BakuModel->search($keyword);
        } else {
            $bahan_baku = $this->Bahan_BakuModel;
        }
        $data = [
            'title' => 'Daftar Bahan Baku',
            'bahan_baku' => $bahan_baku->getBahan_Baku()
        ];
        return view('bahan_baku/index', $data);
    }
    public function tambah()
    {
        session();
        $data = ['title' => 'Tambah Bahan Baku', 'error' => $this->validator == null ? [] :
            $this->validator->getErrors(),];
        return view('bahan_baku/tambah', $data);
    }
    public function simpan()
    {
        if (!$this->validate([
            'kode_bhnbaku' => [
                'rules' => 'required|is_unique[bahan_baku.kode_bhnbaku]',
                'errors' => [
                    'required' => 'kode bahan baku wajib di isi',
                    'is_unique' => 'kode bahan baku sudah ada'
                ]
            ]
        ])) {
            $data = [
                'title' => 'Tambah Bahan Baku',
                'error' => $this->validator->getErrors()
            ];
            return view('bahan_baku/tambah', $data);
        }

        $this->Bahan_BakuModel->insert([
            'kode_bhnbaku' => $this->request->getVar('kode_bhnbaku'),
            'nama_bahan' => $this->request->getVar('nama_bahan'),
            'tanggal_bahan' => $this->request->getVar('tanggal_bahan')
        ]);
        session()->setFlashdata('pesan', 'Data Sudah berhasil ditambahkan');
        return redirect()->to('/bahan_baku');
    }
    public function hapus($bahan_baku)
    {

        $this->Bahan_BakuModel->delete($bahan_baku);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');

        return redirect()->to('/bahan_baku');
    }
    public function ubah($bahan_baku)
    {
        session();
        $data = [
            'title' => 'Ubah Data Bahan Baku',
            'error' => $this->validator == null ? [] : $this->validator->getErrors(),
            'bahan_baku' => $this->Bahan_BakuModel->getBahan_Baku($bahan_baku)
        ];

        return view('bahan_baku/ubah', $data);
    }
    public function update($bahan_baku)
    {

        $this->Bahan_BakuModel->update($bahan_baku, [
            'kode_bhnbaku' => $this->request->getVar('kode_bhnbaku'),
            'nama_bahan' => $this->request->getVar('nama_bahan'),
            'tanggal_bahan' => $this->request->getVar('tanggal_bahan')

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil diubah');

        return redirect()->to('/bahan_baku');
    }
    public function detail($id)
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $bahan_baku = $this->Bahan_BakuModel->search($keyword);
        } else {
            $bahan_baku = $this->Bahan_BakuModel;
        }
        $data = [
            'title' => 'Daftar Bahan Baku',
            'bahan_baku' => $bahan_baku->getBahan_Baku($id)
        ];
        return view('bahan_baku/detail', $data);
    }
}
