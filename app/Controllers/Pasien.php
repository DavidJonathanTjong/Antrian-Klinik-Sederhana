<?php

namespace App\Controllers;

use App\Models\PasienModel;
class Pasien extends BaseController
{
    public function index(){
        $model = new PasienModel();
        $data = [
            'title' => 'Pasien',
            'content' => 'pasien/v_pasien',
            'getData' => $model->getAllData()
        ];
        return view('template', $data);
    }

    public function tambahform(){
        helper('form');
        $data = [
            'title' => 'Tambah Pasien',
            'content' => 'pasien/v_pasien_add',
        ];
        return view('template', $data);
    }

    public function submit(){
        $session = session();
        $data = array(
            'nik' => $this->request->getPost('nik'),
            'nomor_bpjs' => $this->request->getPost('nomor_bpjs'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'email' => $this->request->getPost('email'),
            'status' => 'aktif'
        );
        
        $model = new PasienModel();
        $result = $model->insertData($data);
        if($result){
            return redirect()->to('sirs/pasien');
        }else{
            $session->setFlashdata('msg', '<b>Pastikan Data Sudah Benar!</b>');
            return redirect()->to('sirs/pasien/add');
        }
    }

    public function edit($id){
        helper('form');
        $model = new PasienModel();
        $data = [
            'title' => 'Ubah Pasien',
            'content' => 'pasien/v_pasien_edit',
            'getData' => $model->getDataById($id)
        ];
        return view('template', $data);
    }

    public function update(){
        $session = session();
        $id_pasien = $this->request->getPost('id_pasien');
        $nik = $this->request->getPost('nik');
        $nomor_bpjs  =$this->request->getPost('nomor_bpjs');
        $nama  =$this->request->getPost('nama');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $nomor_telepon = $this->request->getPost('nomor_telepon');
        $email = $this->request->getPost('email');
        $status = $this->request->getPost('status');

        $data = array(
            'id_pasien' => $id_pasien,
            'nik' => $nik,
            'nomor_bpjs' => $nomor_bpjs,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tanggal_lahir' => $tanggal_lahir,
            'nomor_telepon' => $nomor_telepon,
            'email' => $email,
            'status' => $status,
        );
        
        $model = new PasienModel();
        $result = $model->updateData($id_pasien, $data);
            if($result){
                return redirect()->to('sirs/pasien');
            }
            else{
                $session->setFlashdata('msg', '<b>Pastikan data yang diubah sudah benar!</b>');
            echo "Data gagal disimpan.";
            }
        }

        public function delete($id)
        {
            $model = new PasienModel();
            $result = $model->deleteData($id);
            if($result)
                return redirect()->to('sirs/pasien');
            else
            echo "Data gagal dihapus.";
        }
        
}