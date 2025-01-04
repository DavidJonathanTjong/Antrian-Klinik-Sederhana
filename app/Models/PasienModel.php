<?php

namespace App\Models;
use CodeIgniter\Model;

class PasienModel extends Model{
    public function getAllData(){
        $db = \Config\Database::connect();
        $builder = $db->table('pasien');
        return $builder->get()->getResult();
    }

    public function insertData($data){
        $db = \Config\Database::connect();
        $builder = $db->table('pasien');
        return $builder->insert($data);
    }

    public function cekIsPasienAda($nik, $tanggal_lahir)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pasien');
        $builder->where('nik', $nik);
        $builder->where('tanggal_lahir', $tanggal_lahir);
        return $builder->countAllResults() > 0;
    }

    public function getDataById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pasien');
        $builder->where('id_pasien', $id);
        return $builder->get()->getRow();
    }

    public function getDataByNik($nik)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pasien');
        $builder->where('nik', $nik);
        return $builder->get()->getRow();
    }
    public function cekDataByNik($nik)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pasien');
        $builder->where('nik', $nik);
        return $builder->countAllResults() > 0;
    }

    public function updateData($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pasien');
        $builder->where('id_pasien', $id);
        return $builder->update($data);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pasien');
        $builder->where('id_pasien', $id);
        return $builder->delete();
    }

    public function getJumlahPasienAktif()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pasien');
        $builder->where('status', 'aktif');
        return $builder->countAllResults();
    }

    public function getJadwalPasienByNIK($nik)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pasien');
        $builder->select('
            pasien.nama AS nama_pasien,
            kunjungan.pembayaran,
            antrian.nomor_antrian,
            dokter.nama AS nama_dokter,
            antrian.jam_antrian,
            antrian.tanggal AS tanggal_kunjungan
        ');
        $builder->join('kunjungan', 'pasien.id_pasien = kunjungan.id_pasien');
        $builder->join('antrian', 'kunjungan.id_antrian = antrian.id_antrian');
        $builder->join('dokter', 'antrian.id_dokter = dokter.nip');
        $builder->where('pasien.nik', $nik);
        $builder->where('kunjungan.status_kunjungan', 'tidak hadir');
        return $builder->get()->getRow();
    }



}