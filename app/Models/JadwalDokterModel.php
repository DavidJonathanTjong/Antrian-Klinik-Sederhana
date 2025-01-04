<?php

namespace App\Models;
use CodeIgniter\Model;

class JadwalDokterModel extends Model{
    public function getAllData(){
        $db = \Config\Database::connect();
        $builder = $db->table('jadwal');
        return $builder->get()->getResult();
    }

    public function insertData($data){
        $db = \Config\Database::connect();
        $builder = $db->table('jadwal');
        return $builder->insert($data);
    }
    
    public function isDokterExist($nip)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('dokter'); 
        $builder->where('nip', $nip);
        $result = $builder->get()->getRow(); 
        return !is_null($result); 
    }

    public function getDataById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->where('id_jadwal', $id);
        return $builder->get()->getRow();
    }
    public function updateData($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->where('id_jadwal', $id);
        return $builder->update($data);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->where('id_jadwal', $id);
        return $builder->delete();
    }

    public function getDokterByHariPoli($hari)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->where('hari', $hari);
        return $builder->get()->getResultArray();
    }

}