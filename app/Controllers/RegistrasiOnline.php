<?php

namespace App\Controllers;

use App\Models\AntrianModel;
use App\Models\DokterModel;
use App\Models\JadwalDokterModel;
use App\Models\PasienModel;
use App\Models\PenjadwalanModel;
use App\Models\PoliModel;
use App\Models\RuanganModel;

class RegistrasiOnline extends BaseController{
    
    public function tampilanPasienLamaStep1(){
        helper('form');
        $data = [
            'content' => 'v_step1_pasienlama',
        ];
        return view('v_penjadwalan_pasien', $data);
    }
    
    public function cekPasienLama(){
        $model = new PasienModel();
        $nik = $this->request->getPost('nik');
        $tanggal_lahir  =$this->request->getPost('tanggal_lahir');
        $session = session();
        $result = $model->cekIsPasienAda($nik, $tanggal_lahir);
        if($result){
            $pasien = $model->getDataByNik($nik);

            $data = array(
                'nik' => $nik,
                'nomor_bpjs' => $pasien->nomor_bpjs,
                'nama' => $pasien->nama,
                'jenis_kelamin' => $pasien->jenis_kelamin,
                'tanggal_lahir' => $pasien->tanggal_lahir,
                'nomor_telepon' => $pasien->nomor_telepon,
                'email' => $pasien->email,
                'content' => 'v_step2_penjadwalan'
            );
            session()->set('pasien_data', $data);
            return redirect()->to('/regis-online/step2');
        }else{
            $session->setFlashdata('msg', '<b>Anda Belum Terdaftar</b>');
            return redirect()->to('/regis-online/old');
        }
    }

    public function tampilanPasienBaruStep1(){
        helper('form');
        $data = [
            'content' => 'v_step1_pasienbaru',
        ];
        return view('v_penjadwalan_pasien', $data);
    }

    public function simpanDataPasienBaru(){
        $nik = $this->request->getPost('nik');
        $nomor_bpjs  =$this->request->getPost('nomor_bpjs');
        $nama  =$this->request->getPost('nama_pasien');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $nomor_telepon = $this->request->getPost('nomor_telepon');
        $email = $this->request->getPost('email');

        $data = array(
            'nik' => $nik,
            'nomor_bpjs' => $nomor_bpjs,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tanggal_lahir' => $tanggal_lahir,
            'nomor_telepon' => $nomor_telepon,
            'email' => $email,
            'content' => 'v_step2_penjadwalan'
        );
        // simpan data di session
        session()->set('pasien_data', $data);
        // dd($data);
        return redirect()->to('/regis-online/step2');
    }

    public function getDokterByTanggalPoli(){
        log_message('info', 'Request diterima di getDokterByTanggalPoli.');
        $jadwalDokterModel = new JadwalDokterModel(); 
        $dokterModel = new DokterModel(); 

        $tanggal = $this->request->getPost('tanggal_kunjungan');
        $idPoli = $this->request->getPost('id_poli');

        if (empty($tanggal) || empty($idPoli)) {
            return $this->response->setJSON([
                'error' => 'Tanggal kunjungan dan poli harus diisi.'
            ])->setStatusCode(400);
        }
        
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
        // $session = session();

        $jadwal = $jadwalDokterModel->getDokterByHariPoli($hari);
        if (!$jadwal) {
            // $session->setFlashdata('msg', '<b>Anda Belum Terdaftar</b>');
            return $this->response->setJSON([
                'error' => "Tidak ada dokter yang tersedia pada hari $hari."
            ])->setStatusCode(404);
        }

        $result = [];
        foreach ($jadwal as $item) {
            $dokter = $dokterModel->getDokterByNipAndPoli($item['id_dokter'], $idPoli);
            if ($dokter) {
                $result[] = [
                    'nip' => $dokter->nip,
                    'nama_dokter' => $dokter->nama
                ];
            }
        }
        return $this->response->setJSON($result);
        
    }

    public function getLokasi(){
        $lokasiModel = new RuanganModel(); 
        $lokasi = $lokasiModel->getAllData();
        return $this->response->setJSON($lokasi);
    }

    public function getPoliByLokasi(){
        $idLokasi = $this->request->getPost('id_lokasi');
        if (empty($idLokasi)) {
            return $this->response->setJSON([
                'error' => 'ID Lokasi tidak boleh kosong.'
            ])->setStatusCode(400);
        }
        
        $lokasiModel = new RuanganModel(); 
        $poliModel = new PoliModel(); 

        // ambil baris berdasarkan id lokasi
        $row_lokasi = $lokasiModel->getDataById($idLokasi);
        if (!$row_lokasi) {
            return $this->response->setJSON([
                'error' => 'Data lokasi tidak ditemukan.'
            ])->setStatusCode(404);
        }

        //ambil id poli
        $id_poli = $row_lokasi->id_poli;

        $rowPoli = $poliModel->getDataById($id_poli);
        if (!$rowPoli) {
            return $this->response->setJSON([
                'error' => 'Data poli tidak ditemukan.'
            ])->setStatusCode(404);
        }
        return $this->response->setJSON([[
            'id_poli' => $rowPoli->id_poli,
            'nama_poli' => $rowPoli->nama_poli
        ]]);
    }



    public function tampilanStep2(){
        helper('form');
        $pasienData = session()->get('pasien_data');

        $data = [
            'content' => 'v_step2_penjadwalan',
            'pasien_data' => $pasienData,
        ];
        return view('v_penjadwalan_pasien', $data);
    }
    
    public function submitPadaStep2(){
        // tangkap data untuk dikirim ke step3
        $nik = $this->request->getPost('nik');
        $nomor_bpjs  =$this->request->getPost('nomor_bpjs');
        $nama  =$this->request->getPost('nama');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $nomor_telepon = $this->request->getPost('nomor_telepon');
        $email = $this->request->getPost('email');
        $id_lokasi = $this->request->getPost('nama_lokasi');
        $id_poli = $this->request->getPost('nama_poli');
        $tanggal_kunjungan = $this->request->getPost('tanggal_kunjungan');
        $id_dokter = $this->request->getPost('nama_dokter');
        $metode_pembayaran = $this->request->getPost('metode_pembayaran');

        $modelDokter = new DokterModel();
        $modelPoli = new PoliModel();
        $modelLokasi = new RuanganModel();
        $nama_dokter = $modelDokter->getDataById($id_dokter)->nama;
        $nama_poli = $modelPoli->getDataById($id_poli)->nama_poli;
        $nama_lokasi = $modelLokasi->getDataById($id_lokasi)->nama_tempat;

        //proses mengirim data ke step 3
        $data = [
            'nik' => $nik,
            'nomor_bpjs' => $nomor_bpjs,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tanggal_lahir' => $tanggal_lahir,
            'nomor_telepon' => $nomor_telepon,
            'email' => $email,
            'nama_lokasi' => $nama_lokasi,
            'nama_poli' => $nama_poli,
            'tanggal_kunjungan' => $tanggal_kunjungan,
            'nama_dokter' => $nama_dokter,
            'metode_pembayaran' => $metode_pembayaran,
            'content' => 'v_step3_konfirmasi',
        ];
        // simpan data di session
        session()->set('pasien_data', $data);
        return redirect()->to('/regis-online/step3');
    }

    public function tampilanStep3(){
        helper('form');
        $pasienData = session()->get('pasien_data');
        $data = [
            'content' => 'v_step3_konfirmasi',
            'pasien_data' => $pasienData,
        ];
        return view('v_penjadwalan_pasien', $data);
    }

    public function registerPasienOnline(){
        $modelPasien = new PasienModel();
        $modelAntrian = new AntrianModel();
        $modelPenjadwalan = new PenjadwalanModel();
        $modelRuangan = new RuanganModel();
        $modelDokter = new DokterModel();

        $nama_lokasi = $this->request->getPost('nama_lokasi');
        $tanggal_kunjungan = $this->request->getPost('tanggal_kunjungan');
        $nama_dokter = $this->request->getPost('nama_dokter');
        $metode_pembayaran = $this->request->getPost('metode_pembayaran');

        // query untuk mendapatkan id lokasi dan id dokter
        $id_lokasi = $modelRuangan->getIdByNama($nama_lokasi)->id_lokasi;
        // dd($id_lokasi);
        // $id_poli = $modelPoli->getIdByNama($nama_poli);
        $id_dokter = $modelDokter->getIdByNama($nama_dokter)->nip;
        // dd($id_dokter);
        $nik = $this->request->getPost('nik');
        
        $result = $modelPasien->cekDataByNik($nik); // cek apakah pasien baru
        if(!$result){
            // insert data pasien dulu
            $nomor_bpjs = $this->request->getPost('nomor_bpjs');
            $nama  =$this->request->getPost('nama');
            $jenis_kelamin = $this->request->getPost('jenis_kelamin');
            $tanggal_lahir = $this->request->getPost('tanggal_lahir');
            $nomor_telepon = $this->request->getPost('nomor_telepon');
            $email = $this->request->getPost('email');
            $dataPasienBaru = array(
                'nik' => $nik,
                'nomor_bpjs' => $nomor_bpjs,
                'nama' => $nama,
                'jenis_kelamin' => $jenis_kelamin,
                'tanggal_lahir' => $tanggal_lahir,
                'nomor_telepon' => $nomor_telepon,
                'email' => $email,
            );
            // dd($dataPasienBaru);
            $modelPasien->insertData($dataPasienBaru);
        }
        // ambil id pasien
        $id_pasien = $modelPasien->getDataByNik($nik)->id_pasien;
        // insert antrian dan dapatkan id antrian itu
        $id_antrian = $modelAntrian->createAntrianBasedJadwalDokterForRegisOnline($id_lokasi, $id_dokter, $tanggal_kunjungan);

        // insert penjadwalan
        $data_penjadwalan = array(
            'id_pasien' => $id_pasien,
            'id_antrian' => $id_antrian,
            'pembayaran' => $metode_pembayaran,
            'status_kunjungan' => 'tidak hadir'
        );
        // dd($data_penjadwalan);
        
        // jika sukses akan pergi ke route untuk cek jadwal
        $hasilAkhir = $modelPenjadwalan->insertData($data_penjadwalan);
        if($hasilAkhir){
            session()->setFlashdata('pesanRegis', 'Registrasi berhasil! Anda telah terdaftar.');
            return redirect()->to('/');
        }
    }

    public function successRegis(){
        return view('berhasilregis');
    }
        
}