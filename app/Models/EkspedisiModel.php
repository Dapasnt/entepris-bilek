<?php

namespace App\Models;

use CodeIgniter\Model;

class EkspedisiModel extends Model
{
    protected $table = 'ekspedisi';
    protected $primaryKey = 'kode_ekspedisi';
    protected $allowedFields = ['kode_ekspedisi', 'nama_barang', 'alamat', 'hp'];
    public function search($keyword)
    {
        return $this->table('ekspedisi')->like('kode_ekspedisi', $keyword)->orLike('nama_barang', $keyword)->orLike('alamat', $keyword)->orLike('hp', $keyword);
    }
    public function getEkspedisi($kodeekspedisi = false)
    {
        if ($kodeekspedisi == false) {
            return $this->findAll();
        }
        return $this->where(['kode_ekspedisi' => $kodeekspedisi])->first();
    }
}
