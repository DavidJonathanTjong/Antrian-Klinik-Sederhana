<?php

namespace App\Models;
use CodeIgniter\Model;

class PegawaiModel extends Model{
    public function getAllData(){
        $db = \Config\Database::connect();
        $builder = $db->table('pegawai');
        return $builder->get()->getResult();
    }

    public function insertData($data){
        $db = \Config\Database::connect();
        $builder = $db->table('pegawai');
        return $builder->insert($data);
    }

    public function isPenggunaAvailable($id_pengguna)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pegawai');
        $builder->where('id_pengguna', $id_pengguna);
        return $builder->countAllResults() > 0;
    }
    
    public function isPenggunaExist($id_pengguna)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengguna'); 
        $builder->where('id_pengguna', $id_pengguna);
        $result = $builder->get()->getRow(); 
        return !is_null($result); 
    }

    public function getDataById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pegawai');
        $builder->where('nip', $id);
        return $builder->get()->getRow();
    }
    public function updateData($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pegawai');
        $builder->where('nip', $id);
        return $builder->update($data);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pegawai');
        $builder->where('nip', $id);
        return $builder->delete();
    }

}