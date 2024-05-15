<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class AnggotaSeeder extends Seeder 
{
    public function run(){
        $faker = \Faker\Factory::create('id_ID');
        for ($i=0; $i<100; $i++){
        $data = [
            
            'nama'   => $faker->name,
            'alamat' => $faker->address,
            'nomor'  => $faker->e164PhoneNumber
            

        ];
        //$this->db->query("INSERT INTO anggota (nama,alamat,nomor) VALUES (:nama:, :alamat:, :nomor:)",$data);
        $this->db->table('anggota')->insert($data);
    }
    }
} 

?>