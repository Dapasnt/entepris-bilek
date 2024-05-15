<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiModel extends Model{
    protected $table = "gol_gaji";
    protected $primaryKey = "golongan";
    protected $allowedFields = ['golongan','gaji'];

    public function search($keyword){
        return $this->table('gol_gaji')->like('golongan',$keyword)->orLike('gaji',$keyword);
    }
    public function getGaji($gol_gaji = false){
        if ($gol_gaji == false){
            return $this->findAll();
        }
        return $this->where(['golongan' => $gol_gaji])->first();
    }
}
?>