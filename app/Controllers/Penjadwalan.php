<?php

namespace App\Controllers;
use App\Models\PenjadwalanModel;

class Penjadwalan extends BaseController
{
    public function index(){
        $model = new PenjadwalanModel();
        $status = $this->request->getVar('status') ?? 'tidak hadir'; //jika status tidak ada maka default tidak hadir
        $data = [
            'title' => 'Penjadwalan Janji Dokter',
            'content' => 'kunjungan/v_kunjungan',
            'getData' => $model->getDataByStatus($status),
            'status' => $status
        ];
        return view('template', $data);
    }

    public function tambahform(){
        helper('form');
        $data = [
            'title' => 'Tambah Penjadwalan Janji Dokter',
            'content' => 'kunjungan/v_kunjungan_add',
        ];
        return view('template', $data);
    }

    public function submit(){
        $session = session();
        $id_pasien = $this->request->getPost('id_pasien');
        $id_antrian = $this->request->getPost('id_antrian');
        $pembayaran = $this->request->getPost('pembayaran');

        $data = array(
            'id_pasien' => $id_pasien,
            'id_antrian' => $id_antrian,
            'pembayaran' => $pembayaran,
            'status_kunjungan' => 'tidak hadir',
        );
        
        $model = new PenjadwalanModel();
        if (!$model->isPasienExist($id_pasien)) {
            $session->setFlashdata('msg', '<b>Pasien Tidak Tersedia</b>');
            return redirect()->to('sirs/penjadwalan/add');
        }
        if (!$model->isAntrianExist($id_antrian)) {
            $session->setFlashdata('msg', '<b>Antrian tidak tersedia</b>');
            return redirect()->to('sirs/penjadwalan/add');
        }
        $result = $model->insertData($data);
        if($result){
            return redirect()->to('sirs/penjadwalan');
        }else{
            $session->setFlashdata('msg', '<b>Pastikan Data Sudah Benar!</b>');
            return redirect()->to('sirs/penjadwalan/add');
        }
    }

    public function updateStatus($id){
        $model = new PenjadwalanModel();
        $session = session();
        $update = $model->updateData($id, 'hadir');

        //perlu tambahkan untuk status pasien

        if ($update) {
            echo 'berhasil update';
        } else {
            $session->setFlashdata('msg', 'Gagal memperbarui status kunjungan.');
        }

        return redirect()->to('sirs/penjadwalan');

    }

    public function delete($id){
        $model = new PenjadwalanModel();
        $result = $model->deleteData($id);
        if($result)
            return redirect()->to('sirs/penjadwalan');
        else
        echo "Data gagal dihapus.";
    }
        
}