<?php

namespace App\Models;
use CodeIgniter\Model;

class AntrianModel extends Model{
    public function getAllData(){
        $db = \Config\Database::connect();
        $builder = $db->table('antrian');
        return $builder->get()->getResult();
    }

    public function isLokasiExist($id_lokasi)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('lokasi'); 
        $builder->where('id_lokasi', $id_lokasi);
        $result = $builder->get()->getRow(); 
        return !is_null($result); 
    }
    public function isDokterExist($id_dokter)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('dokter'); 
        $builder->where('nip', $id_dokter);
        $result = $builder->get()->getRow(); 
        return !is_null($result); 
    }

    public function createAntrianBasedJadwalDokter($idLokasi, $idDokter, $tanggal)
    {
        $db = \Config\Database::connect();
        $builderAntrian = $db->table('antrian');
        $builderJadwal = $db->table('jadwal');

        // Dapatkan hari dari tanggal (misal: 'Senin', 'Selasa')
        $hari = date('l', strtotime($tanggal));
        $hariMapping = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ];
        $hari = $hariMapping[$hari];

        // Dapatkan jadwal dokter berdasarkan hari
        $builderJadwal->select('waktu_mulai, waktu_selesai');
        $builderJadwal->where('id_dokter', $idDokter);
        $builderJadwal->where('hari', $hari);
        $jadwalDokter = $builderJadwal->get()->getRow();

        if (!$jadwalDokter) {
            throw new \Exception('Dokter tidak memiliki jadwal pada hari tersebut.');
        }

        // Cari waktu terakhir di antrian untuk dokter dan lokasi yang sama
        $builderAntrian->select('MAX(jam_antrian) AS last_time');
        $builderAntrian->where('id_dokter', $idDokter);
        $builderAntrian->where('id_lokasi', $idLokasi);
        $builderAntrian->where('tanggal', $tanggal);
        $lastTime = $builderAntrian->get()->getRow()->last_time;

        // Tentukan waktu antrian berikutnya
        $newTime = $lastTime ? date('H:i:s', strtotime($lastTime) + (30 * 60)) : $jadwalDokter->waktu_mulai;

        // Pastikan waktu antrian tidak melebihi waktu selesai dokter
        if (strtotime($newTime) > strtotime($jadwalDokter->waktu_selesai)) {
            throw new \Exception('Antrian sudah penuh untuk hari ini.');
        }

        // Buat nomor antrian baru
        $count = $builderAntrian->where('id_dokter', $idDokter)
                                ->where('id_lokasi', $idLokasi)
                                ->where('tanggal', $tanggal)
                                ->countAllResults();
        $newNomorAntrian = 'A-' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        // Simpan data ke tabel antrian
        $data = [
            'nomor_antrian' => $newNomorAntrian,
            'id_lokasi' => $idLokasi,
            'id_dokter' => $idDokter,
            'tanggal' => $tanggal,
            'jam_antrian' => $newTime
        ];
        
        return $builderAntrian->insert($data);
    }

    //dibuat lagi untuk menghindari race condition
    public function createAntrianBasedJadwalDokterForRegisOnline($idLokasi, $idDokter, $tanggal){
        $db = \Config\Database::connect();
        $builderAntrian = $db->table('antrian');
        $builderJadwal = $db->table('jadwal');

        // Dapatkan hari dari tanggal (misal: 'Senin', 'Selasa')
        $hari = date('l', strtotime($tanggal));
        $hariMapping = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ];
        $hari = $hariMapping[$hari];

        // Dapatkan jadwal dokter berdasarkan hari
        $builderJadwal->select('waktu_mulai, waktu_selesai');
        $builderJadwal->where('id_dokter', $idDokter);
        $builderJadwal->where('hari', $hari);
        $jadwalDokter = $builderJadwal->get()->getRow();

        if (!$jadwalDokter) {
            throw new \Exception('Dokter tidak memiliki jadwal pada hari tersebut.');
        }

        // Cari waktu terakhir di antrian untuk dokter dan lokasi yang sama
        $builderAntrian->select('MAX(jam_antrian) AS last_time');
        $builderAntrian->where('id_dokter', $idDokter);
        $builderAntrian->where('id_lokasi', $idLokasi);
        $builderAntrian->where('tanggal', $tanggal);
        $lastTime = $builderAntrian->get()->getRow()->last_time;

        // Tentukan waktu antrian berikutnya
        $newTime = $lastTime ? date('H:i:s', strtotime($lastTime) + (30 * 60)) : $jadwalDokter->waktu_mulai;

        // Pastikan waktu antrian tidak melebihi waktu selesai dokter
        if (strtotime($newTime) > strtotime($jadwalDokter->waktu_selesai)) {
            throw new \Exception('Antrian sudah penuh untuk hari ini.');
        }

        // Buat nomor antrian baru
        $count = $builderAntrian->where('id_dokter', $idDokter)
                                ->where('id_lokasi', $idLokasi)
                                ->where('tanggal', $tanggal)
                                ->countAllResults();
        $newNomorAntrian = 'A-' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        // Simpan data ke tabel antrian
        $data = [
            'nomor_antrian' => $newNomorAntrian,
            'id_lokasi' => $idLokasi,
            'id_dokter' => $idDokter,
            'tanggal' => $tanggal,
            'jam_antrian' => $newTime
        ];
        
        $builderAntrian->insert($data);
        $insertedId = $db->insertID();
        return $insertedId;
    }

    public function getDataById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('antrian');
        $builder->where('id_antrian', $id);
        return $builder->get()->getRow();
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('antrian');
        $builder->where('id_antrian', $id);
        return $builder->delete();
    }

}