<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = "user";
    protected $primaryKey = "kode_user";
    protected $allowedFields = ['kode_user','username','password','role'];

    public function search($keyword){
        return $this->table('user')->like('kode_user',$keyword)->orLike('username',$keyword)->orLike('password',$keyword)->orLike('role',$keyword);
    }
    public function getUser ($kode_user = false){
        if ($kode_user == false){
            return $this->findAll();
        }
        return $this->where(['kode_user' => $kode_user])->first();
    }
    public function totalUser(){
        return $this->table('user')->countAll();
    }
}
?>