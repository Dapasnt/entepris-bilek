<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model{
    protected $table = "penggajian";
    protected $primaryKey = "id_gaji";
    protected $allowedFields = ['id_gaji','id_karyawan','golongan','tanggal','status'];

    public function search($keyword){
        return $this->table('penggajian')->like('id_gaji',$keyword)->orLike('id_karyawan',$keyword)->orLike('golongan',$keyword)->orLike('tanggal',$keyword)->orLike('status',$keyword);
    }
    public function getPenggajian($id_gaji = false){
        if ($id_gaji == false){
            return $this->findAll();
        }
        return $this->where(['id_gaji' => $id_gaji])->first();
    }
    public function countUser($table) {
        return $this->$table($table)->countAllResult();
    }
}
?>