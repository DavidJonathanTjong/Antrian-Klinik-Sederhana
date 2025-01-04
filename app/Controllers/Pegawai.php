<?php

namespace App\Controllers;
use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    public function index(){
        $model = new PegawaiModel();
        $data = [
            'title' => 'Pegawai',
            'content' => 'pegawai/v_pegawai',
            'getData' => $model->getAllData()
        ];
        return view('template', $data);
    }

    public function tambahform(){
        helper('form');
        $data = [
            'title' => 'Tambah Pegawai',
            'content' => 'pegawai/v_pegawai_add',
        ];
        return view('template', $data);
    }

    public function submit(){
        $session = session();
        $id_pengguna = $this->request->getPost('id_pengguna');
        $data = array(
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'nik' => $this->request->getPost('nik'),
            'jabatan' => $this->request->getPost('jabatan'),
            'id_pengguna' => $id_pengguna,
        );
        
        $model = new PegawaiModel();
        if ($model->isPenggunaAvailable($data['id_pengguna'])) {
            $session->setFlashdata('msg', '<b>ID Pengguna sudah digunakan oleh pegawai lain</b>');
            return redirect()->to('sirs/pegawai/add');
        }

        if (!$model->isPenggunaExist($id_pengguna)) {
            $session->setFlashdata('msg', '<b>ID Pengguna tidak tersedia. Silakan gunakan ID Pengguna yang valid.</b>');
            return redirect()->to('sirs/pegawai/add');
        }

        $result = $model->insertData($data);
        if($result){
            return redirect()->to('sirs/pegawai');
        }else{
            $session->setFlashdata('msg', '<b>Pastikan Data Sudah Benar dan 1 ID Pengguna untuk 1 Pegawai!</b>');
            return redirect()->to('sirs/pegawai/add');
        }
    }

    public function edit($id){
        helper('form');
        $model = new PegawaiModel();
        $data = [
            'title' => 'Ubah Pegawai',
            'content' => 'pegawai/v_pegawai_edit',
            'getData' => $model->getDataById($id)
        ];
        return view('template', $data);
    }

    public function update(){
        $session = session();
        $nip = $this->request->getPost('nip');
        $nama  =$this->request->getPost('nama');
        $jenis_kelamin  =$this->request->getPost('jenis_kelamin');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $nik = $this->request->getPost('nik');
        $jabatan = $this->request->getPost('jabatan');
        $id_pengguna = $this->request->getPost('id_pengguna');

        $data = array(
            'nip' => $nip,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tanggal_lahir' => $tanggal_lahir,
            'nik' => $nik,
            'jabatan' => $jabatan,
            'id_pengguna' => $id_pengguna,
        );
        
        $model = new PegawaiModel();

        if (!$model->isPenggunaExist($id_pengguna)) {
            $session->setFlashdata('msg', '<b>ID Pengguna tidak tersedia. Silakan gunakan ID Pengguna yang valid.</b>');
            return redirect()->to('sirs/pegawai/edit/' .$nip);
        }

        $result = $model->updateData($nip, $data);
            if($result){
                return redirect()->to('sirs/pegawai');
            }
            else{
                $session->setFlashdata('msg', '<b>Pastikan data yang diubah sudah benar!</b>');
            echo "Data gagal disimpan.";
            }
        }

        public function delete($id)
        {
            $model = new PegawaiModel();
            $result = $model->deleteData($id);
            if($result)
                return redirect()->to('sirs/pegawai');
            else
            echo "Data gagal dihapus.";
        }
        
}