<?php

namespace App\Controllers;

use App\Models\AntrianModel;

class Antrian extends BaseController
{
    public function index(){
        $model = new AntrianModel();
        $data = [
            'title' => 'Antrian',
            'content' => 'antrian/v_antrian',
            'getData' => $model->getAllData()
        ];
        return view('template', $data);
    }

    public function tambahform(){
        helper('form');
        $data = [
            'title' => 'Tambah Antrian',
            'content' => 'antrian/v_antrian_add',
        ];
        return view('template', $data);
    }

    public function submit(){
        $session = session();
        $id_lokasi = $this->request->getPost('id_lokasi');
        $tanggal = $this->request->getPost('tanggal');
        $id_dokter = $this->request->getPost('id_dokter');
        
        $model = new AntrianModel();
        if (!$model->isLokasiExist($id_lokasi)) {
            $session->setFlashdata('msg', '<b>Lokasi Tidak Tersedia</b>');
            return redirect()->to('sirs/antrian/add');
        }
        if (!$model->isDokterExist($id_dokter)) {
            $session->setFlashdata('msg', '<b>NIP Dokter tidak tersedia</b>');
            return redirect()->to('sirs/antrian/add');
        }

        try {
            $result = $model->createAntrianBasedJadwalDokter($id_lokasi, $id_dokter, $tanggal);
            if ($result) {
                return redirect()->to('sirs/antrian');
            } else {
                $session->setFlashdata('msg', '<b>Pastikan Data Sudah Benar dan 1 ID Pengguna untuk 1 Pegawai!</b>');
                return redirect()->to('sirs/antrian/add');
            }
        } catch (\Exception $e) {
            $session->setFlashdata('msg', '<b>' . $e->getMessage() . '</b>');
            return redirect()->to('sirs/antrian/add');
        }
    }

    public function delete($id){
        $model = new AntrianModel();
        $result = $model->deleteData($id);
        if($result)
            return redirect()->to('sirs/antrian');
        else
        echo "Data gagal dihapus.";
    }
        
}