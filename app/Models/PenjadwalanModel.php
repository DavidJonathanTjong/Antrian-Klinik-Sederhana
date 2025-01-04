<?php

namespace App\Models;
use CodeIgniter\Model;

class PenjadwalanModel extends Model{
    public function getAllData(){
        $db = \Config\Database::connect();
        $builder = $db->table('kunjungan');
        $builder->where('status_kunjungan', 'tidak hadir'); 
        return $builder->get()->getResult();
    }

    public function isPasienExist($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pasien'); 
        $builder->where('id_pasien', $id);
        $result = $builder->get()->getRow(); 
        return !is_null($result); 
    }
    public function isAntrianExist($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('antrian'); 
        $builder->where('id_antrian', $id);
        $result = $builder->get()->getRow(); 
        return !is_null($result); 
    }

    public function getDataById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kunjungan');
        $builder->where('id_kunjungan', $id);
        return $builder->get()->getRow();
    }
    
    public function getDataHadir()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kunjungan');
        $builder->where('status_kunjungan', 'hadir'); 
        return $builder->get()->getResult();
    }

    public function getDataByStatus($status)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kunjungan');
        $builder->where('status_kunjungan', $status);
        return $builder->get()->getResult();
    }



    public function insertData($data){
        $db = \Config\Database::connect();
        $builder = $db->table('kunjungan');
        return $builder->insert($data);
    }

    public function updateData($idKunjungan, $status){
        $db = \Config\Database::connect();
        $builder = $db->table('kunjungan');
        $builder->where('id_kunjungan', $idKunjungan);
        return $builder->update(['status_kunjungan' => $status]);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kunjungan');
        $builder->where('id_kunjungan', $id);
        return $builder->delete();
    }

    public function kunjunganBulanan(){
        $db = \Config\Database::connect();
        $builder = $db->table('kunjungan k');
        $builder->select('k.id_kunjungan, k.id_pasien, k.id_antrian, a.tanggal, a.nomor_antrian, a.id_lokasi, a.jam_antrian')
                ->join('antrian a', 'k.id_antrian = a.id_antrian')
                ->where('k.status_kunjungan', 'hadir')
                ->where('MONTH(a.tanggal)', date('m'))
                ->where('YEAR(a.tanggal)', date('Y'));

        $count = $builder->countAllResults();
        return $count;
    }

    public function kunjunganHarian(){
        $db = \Config\Database::connect();
        $builder = $db->table('kunjungan k');
        $builder->select('k.id_kunjungan, k.id_pasien, k.id_antrian, a.tanggal, a.nomor_antrian, a.id_lokasi, a.jam_antrian')
                ->join('antrian a', 'k.id_antrian = a.id_antrian')
                ->where('k.status_kunjungan', 'hadir')
                ->where('a.tanggal', date('Y-m-d'));

        $count = $builder->countAllResults();
        return $count;
    }

    public function getJumlahKunjunganPending()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kunjungan');
        $builder->select('COUNT(*) AS jumlah_tidak_hadir');
        $builder->join('antrian', 'kunjungan.id_antrian = antrian.id_antrian');
        $builder->where('antrian.tanggal >= CURDATE()');
        $builder->where('kunjungan.status_kunjungan', 'tidak hadir');
        $count = $builder->countAllResults();
        return $count;
    }
    public function kunjunganPerBulan()
    {
        $db = \Config\Database::connect();
        $query = $db->table('kunjungan')
            ->select('MONTH(antrian.tanggal) as bulan, COUNT(*) as jumlah_kunjungan')
            ->join('antrian', 'kunjungan.id_antrian = antrian.id_antrian')
            ->where('kunjungan.status_kunjungan', 'hadir')
            ->where('YEAR(antrian.tanggal)', date('Y'))
            ->groupBy('MONTH(antrian.tanggal)')
            ->orderBy('MONTH(antrian.tanggal)', 'ASC')
            ->get();
            
        return $query->getResultArray(); 
    }



}