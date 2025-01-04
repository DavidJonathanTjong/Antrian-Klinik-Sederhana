<?php

namespace App\Models;
use CodeIgniter\Model;

class PoliModel extends Model{
    public function getAllData(){
        $db = \Config\Database::connect();
        $builder = $db->table('poli');
        return $builder->get()->getResult();
    }

    public function insertData($data){
        $db = \Config\Database::connect();
        $builder = $db->table('poli');
        return $builder->insert($data);
    }

    public function isPoliAvailable($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('poli');
        $builder->where('id_poli', $id);
        return $builder->countAllResults() > 0;
    }

    public function getDataById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('poli');
        $builder->where('id_poli', $id);
        return $builder->get()->getRow();
    }
    public function updateData($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('poli');
        $builder->where('id_poli', $id);
        return $builder->update($data);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('poli');
        $builder->where('id_poli', $id);
        return $builder->delete();
    }

    public function getIdByNama($nama)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('poli');
        $builder->where('nama_poli', $nama);
        return $builder->get()->getRow()->id_poli ?? null;
    }

    

}