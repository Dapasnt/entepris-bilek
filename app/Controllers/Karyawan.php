<?php

namespace App\Controllers;

use App\Models\KaryawanModel;

class Karyawan extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->KaryawanModel = new KaryawanModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $karyawan = $this->KaryawanModel->search($keyword);
        } else {
            $karyawan = $this->KaryawanModel;
        }
        $data = [
            'title' => 'Daftar Karyawan',
            'karyawan' => $karyawan->getKaryawan()
        ];
        return view('karyawan/index', $data);
    }

    public function tampil()
    {
        $jumlah = $this->KaryawanModel;
        $data = [
            'title' => 'Jumlah Karyawan',
            'jml_karyawan' => $jumlah->totalKaryawan()
        ];
        // dd($data);
        return view('pages/pemilik',$data);
    }
    public function tambah()
    {
        session();
        $data = ['title' => 'Tambah Karyawan', 'error' => $this->validator == null ? [] :
            $this->validator->getErrors(),];
        return view('karyawan/tambah', $data);
    }
    public function simpan()
    {
        if (!$this->validate([
            'id_karyawan' => [
                'rules' => 'required|is_unique[karyawan.id_karyawan]',
                'errors' => [
                    'required' => 'id karyawan wajib di isi',
                    'is_unique' => 'id karyawan sudah ada'
                ]
            ]
        ])) {
            $data = [
                'title' => 'Tambah Karyawan',
                'error' => $this->validator->getErrors()
            ];
            return view('karyawan/tambah', $data);
        }

        $this->KaryawanModel->insert([
            'id_karyawan' => $this->request->getVar('id_karyawan'),
            'nama' => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),

        ]);
        session()->setFlashdata('pesan', 'Data Sudah berhasil ditambahkan');
        return redirect()->to('/karyawan');
    }
    public function hapus($Karyawan)
    {
        $this->KaryawanModel->delete($Karyawan);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');

        return redirect()->to('/karyawan');
    }
    public function ubah($Karyawan)
    {
        session();
        $data = [
            'title' => 'Ubah Data Karyawan',
            'error' => $this->validator == null ? [] : $this->validator->getErrors(),
            'karyawan' => $this->KaryawanModel->getKaryawan($Karyawan)
        ];

        return view('karyawan/ubah', $data);
    }
    public function update($Karyawan)
    {

        $this->KaryawanModel->update($Karyawan, [
            'id_Karyawan' => $this->request->getVar('id_Karyawan'),
            'nama' => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil diubah');

        return redirect()->to('/karyawan');
    }

    public function detail($id)
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $Karyawan = $this->KaryawanModel->search($keyword);
        } else {
            $Karyawan = $this->KaryawanModel;
        }
        $data = [
            'title' => 'Daftar Karyawan',
            'Karyawan' => $Karyawan->getKaryawan($id)
        ];
        return view('karyawan/detail', $data);
    }
}
