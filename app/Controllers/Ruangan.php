<?php

namespace App\Controllers;

use App\Models\RuanganModel;
class Ruangan extends BaseController
{
    public function index(){
        $model = new RuanganModel();
        $data = [
            'title' => 'Ruangan',
            'content' => 'lokasi/v_lokasi',
            'getData' => $model->getAllData()
        ];
        return view('template', $data);
    }

    public function tambahform(){
        helper('form');
        $data = [
            'title' => 'Tambah Ruangan',
            'content' => 'lokasi/v_lokasi_add',
        ];
        return view('template', $data);
    }

    public function submit(){
        $session = session();
        $id_lokasi = $this->request->getPost('id_lokasi');
        $id_poli = $this->request->getPost('id_poli');
        $data = array(
            'id_lokasi' =>$id_lokasi,
            'nama_tempat' => $this->request->getPost('nama_tempat'),
            'id_poli' => $id_poli,
        );
        
        $model = new RuanganModel();
        if ($model->isPoliAvailable($id_poli) <1) {
            $session->setFlashdata('msg', '<b>ID Poli tidak tersedia. Silakan gunakan ID Poli yang valid.</b>');
            return redirect()->to('sirs/ruangan/add/');
        }

        $result = $model->insertData($data);
        if($result){
            return redirect()->to('sirs/ruangan');
        }else{
            $session->setFlashdata('msg', '<b>Gagal Menyimpan Data</b>');
            return redirect()->to('sirs/ruangan/add');
        }
    }

    public function edit($id){
        helper('form');
        $model = new RuanganModel();
        $data = [
            'title' => 'Ubah Ruangan',
            'content' => 'lokasi/v_lokasi_edit',
            'getData' => $model->getDataById($id)
        ];
        return view('template', $data);
    }

    public function update(){
        $session = session();
        $id_lokasi = $this->request->getPost('id_lokasi');
        $nama_tempat = $this->request->getPost('nama_tempat');
        $id_poli  =$this->request->getPost('id_poli');

        $data = array(
            'id_lokasi' => $id_lokasi,
            'nama_tempat' => $nama_tempat,
            'id_poli' => $id_poli,
        );
        
        $model = new RuanganModel();
        if ($model->isPoliAvailable($id_poli) < 1) {
            $session->setFlashdata('msg', '<b>ID Poli tidak tersedia. Silakan gunakan ID Poli yang valid.</b>');
            return redirect()->to('sirs/ruangan/edit/' .$id_lokasi);
        }

        $result = $model->updateData($id_lokasi, $data);
            if($result){
                return redirect()->to('sirs/ruangan');
            }
            else{
                $session->setFlashdata('msg', '<b>Pastikan data yang diubah sudah benar!</b>');
                echo "Data gagal disimpan.";
            }
        }

        public function delete($id)
        {
            $model = new RuanganModel();
            $result = $model->deleteData($id);
            if($result)
                return redirect()->to('sirs/ruangan');
            else
            echo "Data gagal dihapus.";
        }

        
        
}