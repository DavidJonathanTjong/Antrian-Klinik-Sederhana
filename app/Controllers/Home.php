<?php

namespace App\Controllers;

use App\Models\AntrianModel;
use App\Models\PasienModel;
use App\Models\PegawaiModel;
use App\Models\PenjadwalanModel;

class Home extends BaseController
{
    public function index(): string
    {
        helper('form');
        return view('ViewAwal');
    }

    public function getKunjunganPasien(){
        helper('form');
        $nik = $this->request->getPost('nikJadwal');
        if (empty($nik)) {
            session()->setFlashdata('msg', 'NIK tidak boleh kosong');
            return redirect()->back();
        }
        $model = new PasienModel();
        $data = $model->getJadwalPasienByNIK($nik);

        if (!$data) {
            session()->setFlashdata('msg', 'Jadwal tidak ditemukan');
            return redirect()->back();
        }
        
        return view('ViewAwal', ['jadwal' => $data]);
    }


    public function tampilanPendaftaran(): string
    {
        helper('form');
        return view('v_penjadwalan_pasien');
    }

    public function tampilanDashboard(): string
    {   
        $data = [
            'title' => 'Dashboard',
            'content' => 'dashboard',
        ];
        return view('template', $data);
    }

    public function cekPasienLama(){
        $nik = $this->request->getPost('nik');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');

        // Validasi input
        if (!$nik || !$tanggal_lahir) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data tidak lengkap'
            ]);
        }

        $model = new PasienModel();
        if ($model->cekIsPasienAda($nik, $tanggal_lahir)) {
            return $this->response->setJSON(['success' => true]);
        }else{
            return $this->response->setJSON(['success' => false]);
        }
    }

}