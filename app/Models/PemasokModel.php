<?php 
namespace App\Models;
use CodeIgniter\Model;

class PemasokModel extends Model {
    protected $table = 'pemasok';
    protected $primaryKey = 'kode_pemasok';
    protected $allowedFields = ['kode_pemasok','nama_barang', 'tanggal_masuk'];
    public function search($keyword){
        return $this->table('pemasok')->like('kode_pemasok',$keyword)->orLike('nama_barang',$keyword)->orLike('tanggal_masuk',$keyword);
    }
    public function getPemasok($kodepemasok = false){
        if($kodepemasok == false ){
            return $this-> findAll();
        }
        return $this->where(['kode_pemasok'=>$kodepemasok])->first();
    }  
                                                                                                                                       
}

?>