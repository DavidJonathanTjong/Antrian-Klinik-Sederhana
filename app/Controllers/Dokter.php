<?php

namespace App\Controllers;

use App\Models\DokterModel;
class Dokter extends BaseController
{
    public function index(){
        $model = new DokterModel();
        $data = [
            'title' => 'Dokter',
            'content' => 'dokter/v_dokter',
            'getData' => $model->getAllData()
        ];
        return view('template', $data);
    }

    public function tambahform(){
        helper('form');
        $data = [
            'title' => 'Tambah Dokter',
            'content' => 'dokter/v_dokter_add',
        ];
        return view('template', $data);
    }

    public function submit(){
        $session = session();
        $nip = $this->request->getPost('nip');
        $id_poli = $this->request->getPost('id_poli');
        $data = array(
            'nip' =>$nip,
            'npa_idi' => $this->request->getPost('npa_idi'),
            'nama' => $this->request->getPost('nama'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'email' => $this->request->getPost('email'),
            'id_poli' => $id_poli,
        );
        
        $model = new DokterModel();
        if ($model->isPoliAvailable($id_poli) <1) {
            $session->setFlashdata('msg', '<b>ID Poli tidak tersedia. Silakan gunakan ID Poli yang valid.</b>');
            return redirect()->to('sirs/dokter/add/');
        }

        $result = $model->insertData($data);
        if($result){
            return redirect()->to('sirs/dokter');
        }else{
            $session->setFlashdata('msg', '<b>Gagal Menyimpan Data</b>');
            return redirect()->to('sirs/dokter/add');
        }
    }

    public function edit($id){
        helper('form');
        $model = new DokterModel();
        $data = [
            'title' => 'Ubah Dokter',
            'content' => 'dokter/v_dokter_edit',
            'getData' => $model->getDataById($id)
        ];
        return view('template', $data);
    }

    public function update(){
        $session = session();
        $nip = $this->request->getPost('nip');
        $npa_idi = $this->request->getPost('npa_idi');
        $nama  =$this->request->getPost('nama');
        $nomor_telepon = $this->request->getPost('nomor_telepon');
        $email = $this->request->getPost('email');
        $id_poli  =$this->request->getPost('id_poli');

        $data = array(
            'nip' => $nip,
            'npa_idi' => $npa_idi,
            'nama' => $nama,
            'nomor_telepon' => $nomor_telepon,
            'email' => $email,
            'id_poli' => $id_poli,
        );
        
        $model = new DokterModel();
        if ($model->isPoliAvailable($id_poli) < 1) {
            $session->setFlashdata('msg', '<b>ID Poli tidak tersedia. Silakan gunakan ID Poli yang valid.</b>');
            return redirect()->to('sirs/dokter/edit/' .$nip);
        }

        $result = $model->updateData($nip, $data);
            if($result){
                return redirect()->to('sirs/dokter');
            }
            else{
                $session->setFlashdata('msg', '<b>Pastikan data yang diubah sudah benar!</b>');
                echo "Data gagal disimpan.";
            }
        }

        public function delete($id)
        {
            $model = new DokterModel();
            $result = $model->deleteData($id);
            if($result)
                return redirect()->to('sirs/dokter');
            else
            echo "Data gagal dihapus.";
        }
        
}