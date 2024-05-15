<?php

namespace App\Models;

use CodeIgniter\Model;

class BahanJadiModel extends Model
{
    protected $table = 'bahan_jadi';
    protected $primaryKey = 'kode_bahanjadi';
    protected $allowedFields = ['kode_bahanjadi', 'nama_produksi', 'tanggal_produksi'];
    public function search($keyword)
    {
        return $this->table('bahan_jadi')->like('kode_bahan_jadi', $keyword)->orLike('nama_produksi', $keyword)->orLike('tanggal_produksi', $keyword);
    }
    public function getBahanJadi($kodebahan_jadi = false)
    {
        if ($kodebahan_jadi == false) {
            return $this->findAll();
        }
        return $this->where(['kode_bahanjadi' => $kodebahan_jadi])->first();
    }
}
