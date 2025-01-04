<?php

namespace App\Models;
use CodeIgniter\Model;

class DokterModel extends Model{
    public function getAllData(){
        $db = \Config\Database::connect();
        $builder = $db->table('dokter');
        return $builder->get()->getResult();
    }

    public function insertData($data){
        $db = \Config\Database::connect();
        $builder = $db->table('dokter');
        return $builder->insert($data);
    }
    
    public function getDataById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('dokter');
        $builder->where('nip', $id);
        return $builder->get()->getRow();
    }

    public function getJumlahDokter()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('dokter');
        return $builder->countAllResults();
    }
    


    public function updateData($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('dokter');
        $builder->where('nip', $id);
        return $builder->update($data);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('dokter');
        $builder->where('nip', $id);
        return $builder->delete();
    }

    public function isPoliAvailable($id_poli)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('poli');
        $builder->where('id_poli', $id_poli);
        return $builder->countAllResults() > 0;
    }
    public function getIdByNama($nama)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('dokter');
        $builder->where('nama', $nama);
        return $builder->get()->getRow();
    }

    public function getDokterByNipAndPoli($nip, $idPoli)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('dokter');
        $builder->where('nip', $nip);
        $builder->where('id_poli', $idPoli);
        return $builder->get()->getRow();
    }

}