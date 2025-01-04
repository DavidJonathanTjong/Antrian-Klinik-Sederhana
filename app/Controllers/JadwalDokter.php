<?php

namespace App\Controllers;

use App\Models\JadwalDokterModel;

class JadwalDokter extends BaseController
{
    public function index(){
        $model = new JadwalDokterModel();
        $data = [
            'title' => 'Jadwal Dokter',
            'content' => 'jadwal/v_jadwal',
            'getData' => $model->getAllData()
        ];
        return view('template', $data);
    }

    public function tambahform(){
        helper('form');
        $data = [
            'title' => 'Tambah Jadwal Dokter',
            'content' => 'jadwal/v_jadwal_add',
        ];
        return view('template', $data);
    }

    public function submit(){
        $session = session();
        $id_dokter = $this->request->getPost('id_dokter');
        $data = array(
            'id_dokter' => $id_dokter,
            'hari' => $this->request->getPost('hari'),
            'waktu_mulai' => $this->request->getPost('waktu_mulai'),
            'waktu_selesai' => $this->request->getPost('waktu_selesai'),
        );
        
        $model = new JadwalDokterModel();

        if (!$model->isDokterExist($id_dokter)) {
            $session->setFlashdata('msg', '<b>ID Dokter tidak tersedia</b>');
            return redirect()->to('sirs/jadwaldokter/add');
        }

        $result = $model->insertData($data);
        if($result){
            return redirect()->to('sirs/jadwaldokter');
        }else{
            $session->setFlashdata('msg', '<b>Pastikan Data Sudah Benar </b>');
            return redirect()->to('sirs/jadwaldokter/add');
        }
    }

    public function edit($id){
        helper('form');
        $model = new JadwalDokterModel();
        $data = [
            'title' => 'Ubah Jadwal Dokter',
            'content' => 'jadwal/v_jadwal_edit',
            'getData' => $model->getDataById($id)
        ];
        return view('template', $data);
    }

    public function update(){
        $session = session();
        $id_jadwal = $this->request->getPost('id_jadwal');
        $id_dokter  =$this->request->getPost('id_dokter');
        $hari  =$this->request->getPost('hari');
        $waktu_mulai = $this->request->getPost('waktu_mulai');
        $waktu_selesai = $this->request->getPost('waktu_selesai');

        $data = array(
            'id_jadwal' => $id_jadwal,
            'id_dokter' => $id_dokter,
            'hari' => $hari,
            'waktu_mulai' => $waktu_mulai,
            'waktu_selesai' => $waktu_selesai,
        );
        
        $model = new JadwalDokterModel();

        if (!$model->isDokterExist($id_dokter)) {
            $session->setFlashdata('msg', '<b>ID Dokter tidak tersedia</b>');
            return redirect()->to('sirs/jadwaldokter/edit/' .$id_dokter);
        }

        $result = $model->updateData($id_jadwal, $data);
            if($result){
                return redirect()->to('sirs/jadwaldokter');
            }
            else{
                $session->setFlashdata('msg', '<b>Pastikan data yang diubah sudah benar!</b>');
            echo "Data gagal disimpan.";
            }
        }

        public function delete($id)
        {
            $model = new JadwalDokterModel();
            $result = $model->deleteData($id);
            if($result)
                return redirect()->to('sirs/jadwaldokter');
            else
            echo "Data gagal dihapus.";
        }
        
}