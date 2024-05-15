<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        helper(['form']);
        return view('login');
    }

    public function val_user()
    {
        $session_lg = session();
        $val_user = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $val_user->where('username', $username)->first();
        if ($data) {
            if ($data['password'] == $password) {
                $ses_data = [
                    'kode_user' => $data['kode_user'],
                    'username' => $data['username'],
                    'role' => $data['role'],
                    'loged_in' => true
                ];
                $session_lg->set($ses_data);
                if ($data['role'] == "Pemilik") {
                    return view('pages/pemilik');
                } elseif ($data['role'] == "Admin Gudang") {
                    return view('pages/gudang');
                } elseif ($data['role'] == "Admin Pembelian") {
                    return view('pages/pembelian');
                } elseif ($data['role'] == "Admin Penjualan") {
                    return view('pages/penjualan');
                } elseif ($data['role'] == "Admin Distribusi") {
                    return view('pages/distribusi');
                } else {
                    return redirect()->to('/');
                }
            } else {
                return redirect()->to('/')->with('error', 'Username atau Password Salah');
            }
        } else {
            return redirect()->to('/')->with('error', 'Pengguna tidak ditemukan');
        }
    }

    public function logout_ac()
    {
        $session_lg = session();
        $session_lg = destroy();
        return redirect()->to('/');
    }
}
