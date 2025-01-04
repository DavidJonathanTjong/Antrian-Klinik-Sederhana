<?php

namespace App\Models;
use CodeIgniter\Model;

class RuanganModel extends Model{
    public function getAllData(){
        $db = \Config\Database::connect();
        $builder = $db->table('lokasi');
        return $builder->get()->getResult();
    }

    public function insertData($data){
        $db = \Config\Database::connect();
        $builder = $db->table('lokasi');
        return $builder->insert($data);
    }
    
    public function getDataById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('lokasi');
        $builder->where('id_lokasi', $id);
        return $builder->get()->getRow();
    }

    public function getIdByNama($nama)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('lokasi');
        $builder->where('nama_tempat', $nama);
        return $builder->get()->getRow();
    }


    public function updateData($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('lokasi');
        $builder->where('id_lokasi', $id);
        return $builder->update($data);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('lokasi');
        $builder->where('id_lokasi', $id);
        return $builder->delete();
    }

    public function isPoliAvailable($id_poli)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('poli');
        $builder->where('id_poli', $id_poli);
        return $builder->countAllResults() > 0;
    }

}