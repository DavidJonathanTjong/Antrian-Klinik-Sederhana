<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
    public function getAllData(){
        $db = \Config\Database::connect();
        $builder = $db->table('pengguna');
        return $builder->get()->getResult();
    }

    public function insertData($data){
        $db = \Config\Database::connect();
        $builder = $db->table('pengguna');
        return $builder->insert($data);
    }

    public function isPenggunaAvailable($id_pengguna)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengguna');
        $builder->where('id_pengguna', $id_pengguna);
        return $builder->countAllResults() > 0;
    }

    public function getDataById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengguna');
        $builder->where('id_pengguna', $id);
        return $builder->get()->getRow();
    }
    public function updateData($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengguna');
        $builder->where('id_pengguna', $id);
        return $builder->update($data);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengguna');
        $builder->where('id_pengguna', $id);
        return $builder->delete();
    }

    public function getJumlahAdmin()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengguna');
        $builder->where('role', 'admin');
        return $builder->countAllResults();
    }
    public function getJumlahHRD()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengguna');
        $builder->where('role', 'hrd');
        return $builder->countAllResults();
    }

}