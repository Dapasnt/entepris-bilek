<?php

namespace App\Models;

use CodeIgniter\Model;

class Bahan_BakuModel extends Model
{
    protected $table = 'bahan_baku';
    protected $primaryKey = 'kode_bhnbaku';
    protected $allowedFields = ['kode_bhnbaku', 'nama_bahan', 'tanggal_bahan'];
    public function search($keyword)
    {
        return $this->table('bahan_baku')->like('kode_bhnbaku', $keyword)->orLike('nama_bahan', $keyword)->orLike('tanggal_bahan', $keyword);
    }
    public function getBahan_Baku($kodebhn_baku = false)
    {
        if ($kodebhn_baku == false) {
            return $this->findAll();
        }
        return $this->where(['kode_bhnbaku' => $kodebhn_baku])->first();
    }
}
