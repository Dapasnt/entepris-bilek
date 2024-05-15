<?php

namespace App\Controllers;

use App\Models\PenggajianModel;
use App\Models\KaryawanModel;
use Dompdf\Dompdf;
class Penggajian extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->PenggajianModel = new PenggajianModel();
        $this->KaryawanModel = new KaryawanModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $gaji = $this->PenggajianModel->search($keyword);
        } else {
            $gaji = $this->PenggajianModel;
        }
        $data = [
            'title' => 'Daftar Gaji',
            'gaji' => $gaji->getPenggajian()
        ];
        return view('penggajian/index', $data);
    }

    public function tampil()
    {
        $gaji = $this->PenggajianModel;
        $data = [
            'title' => 'Jumlah Gaji',
            'Gaji' => $gaji->countAllResult()
        ];
        return view('pages/pemilik',$data);
    }
    public function tambah()
    {
        session();
        $data = [
            'title' => 'Tambah Gaji', 'error' => $this->validator == null ? [] :
            $this->validator->getErrors(),
            'karyawan' => $this->KaryawanModel->orderBy('id_karyawan', 'DESC')->findAll()];
        return view('penggajian/tambah', $data);
    }
    public function simpan()
    {
        if (!$this->validate([
            'id_gaji' => [
                'rules' => 'required|is_unique[penggajian.id_gaji]',
                'errors' => [
                    'required' => 'id penggajian wajib di isi',
                    'is_unique' => 'id penggajian sudah ada'
                ]
            ]
        ])) {
            $data = [
                'title' => 'Tambah Gaji',
                'error' => $this->validator->getErrors()
            ];
            return view('penggajian/tambah', $data);
        }

        $this->PenggajianModel->insert([
            'id_gaji' => $this->request->getVar('id_gaji'),
            'id_karyawan' => $this->request->getVar('id_karyawan'),
            'golongan' => $this->request->getVar('golongan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'status' => $this->request->getVar('status'),

        ]);
        session()->setFlashdata('pesan', 'Data Sudah berhasil ditambahkan');
        return redirect()->to('/penggajian');
    }
    public function hapus($gaji)
    {
        $this->PenggajianModel->delete($gaji);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');

        return redirect()->to('/penggajian');
    }
    public function ubah($gaji)
    {
        session();
        $data = [
            'title' => 'Ubah Data Gaji',
            'error' => $this->validator == null ? [] : $this->validator->getErrors(),
            'Gaji' => $this->PenggajianModel->getPenggajian($gaji)
        ];

        return view('penggajian/ubah', $data);
    }
    public function update($gaji)
    {
        $this->PenggajianModel->update($gaji, [
            'id_gaji' => $this->request->getVar('id_gaji'),
            'golongan' => $this->request->getVar('golongan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'status' => $this->request->getVar('status'),
        ]);
        // dd($this);
        session()->setFlashdata('pesan', 'Data Berhasil diubah' );

        return redirect()->to('/penggajian');
    }

    public function detail($id)
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $gaji = $this->PenggajianModel->search($keyword);
        } else {
            $gaji = $this->PenggajianModel;
        }
        $data = [
            'title' => 'Daftar Gaji',
            'Gaji' => $gaji->getPenggajian($id)
        ];
        return view('penggajian/detail', $data);
    }

    public function cetak()
    {
        $data = [
            'title' => 'Daftar Penggajian',
            'gaji' => $this->PenggajianModel->select('penggajian.*, karyawan.nama, gol_gaji.gaji')
                                            ->join('karyawan', 'penggajian.id_karyawan = karyawan.id_karyawan')
                                            ->join('gol_gaji', 'penggajian.golongan = gol_gaji.golongan')
                                            ->findAll(),
            'tanggal'   => date('d M Y')
        ];

        // dd($data);

        $filename = date('y-m-d'). '_Slip_Gaji';
        
        $dompdf = new Dompdf();

        $dompdf->loadHtml(view('penggajian/slipgaji', $data));

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream($filename);

        // dd($dompdf);

        return view('penggajian/slipgaji', $data);
        
    }
}
