<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model{

    protected $table = "karyawan";
    protected $primaryKey = "id_karyawan";
    protected $allowedFields = ['id_karyawan','nama','jabatan','jenis_kelamin','alamat'];

    public function search($keyword){
        return $this->table('karyawan')->like('id_karyawan',$keyword)->orLike('nama',$keyword)->orLike('jabatan',$keyword)->orLike('jenis_kelamin',$keyword)->orLike('alamat',$keyword);
    }
    public function getKaryawan ($id_karyawan = false){
        if ($id_karyawan == false){
            return $this->findAll();
        }
        return $this->where(['id_karyawan' => $id_karyawan])->first();
    }

    public function totalKaryawan(){
        return $this->table('karyawan')->countAll();
    }
}
?>