<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $user = $this->UserModel->search($keyword);
        } else {
            $user = $this->UserModel;
        }
        $data = [
            'title' => 'Daftar User',
            'user' => $user->getUser()
        ];
        return view('user/index', $data);
    }

    public function tampil()
    {
        $jumlah = $this->UserModel;
        $data = [
            'title' => 'Jumlah user',
            'jml_user' => $jumlah->totalUser()
        ];
        return view('pages/pemilik',$data);
    }
    public function tambah()
    {
        session();
        $data = ['title' => 'Tambah User', 'error' => $this->validator == null ? [] :
            $this->validator->getErrors(),];
        return view('user/tambah', $data);
    }
    public function simpan()
    {
        if (!$this->validate([
            'kode_user' => [
                'rules' => 'required|is_unique[user.kode_user]',
                'errors' => [
                    'required' => 'kode user wajib di isi',
                    'is_unique' => 'kode user sudah ada'
                ]
            ]
        ])) {
            $data = [
                'title' => 'Tambah User',
                'error' => $this->validator->getErrors()
            ];
            return view('user/tambah', $data);
        }

        $this->UserModel->insert([
            'kode_user' => $this->request->getVar('kode_user'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role'),

        ]);
        session()->setFlashdata('pesan', 'Data Sudah berhasil ditambahkan');
        return redirect()->to('/user');
    }
    public function hapus($user)
    {
        $this->UserModel->delete($user);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');

        return redirect()->to('/user');
    }
    public function ubah($user)
    {
        session();
        $data = [
            'title' => 'Ubah Data Pemasok',
            'error' => $this->validator == null ? [] : $this->validator->getErrors(),
            'user' => $this->UserModel->getUser($user)
        ];

        return view('/user/ubah', $data);
    }
    public function update($user)
    {

        $this->UserModel->update($user, [
            'kode_user' => $this->request->getVar('kode_user'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role'),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil diubah');

        return redirect()->to('/user');
    }

    public function detail($id)
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $user = $this->UserModel->search($keyword);
        } else {
            $user = $this->UserModel;
        }
        $data = [
            'title' => 'Daftar user',
            'user' => $user->getUser($id),
        ];
        // dd($data);
        return view('user/detail', $data);
    }
}
