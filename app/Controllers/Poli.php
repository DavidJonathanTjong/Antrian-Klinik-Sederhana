<?php

namespace App\Controllers;
use App\Models\PoliModel;

class Poli extends BaseController
{
    public function index(){
        $model = new PoliModel();
        $data = [
            'title' => 'Poliklinik',
            'content' => 'poli/v_poli',
            'getData' => $model->getAllData()
        ];
        return view('template', $data);
    }

    public function tambahform(){
        helper('form');
        $data = [
            'title' => 'Tambah Poliklinik',
            'content' => 'poli/v_poli_add',
        ];
        return view('template', $data);
    }

    public function submit(){
        $session = session();
        $id_poli = $this->request->getPost('id_poli');
        $data = array(
            'id_poli' =>$id_poli,
            'nama_poli' => $this->request->getPost('nama_poli'),
        );
        
        $model = new PoliModel();
        if ($model->isPoliAvailable($id_poli)) {
            $session->setFlashdata('msg', '<b>ID Poli sudah ada</b>');
            return redirect()->to('sirs/poli/add');
        }

        $result = $model->insertData($data);
        if($result){
            return redirect()->to('sirs/poli');
        }else{
            $session->setFlashdata('msg', '<b>Gagal Menyimpan Data</b>');
            return redirect()->to('sirs/poli/add');
        }
    }

    public function edit($id){
        helper('form');
        $model = new PoliModel();
        $data = [
            'title' => 'Ubah Poliklinik',
            'content' => 'poli/v_poli_edit',
            'getData' => $model->getDataById($id)
        ];
        return view('template', $data);
    }

    public function update(){
        $session = session();
        $id_poli = $this->request->getPost('id_poli');
        $nama_poli = $this->request->getPost('nama_poli');

        $data = array(
            'id_poli' => $id_poli,
            'nama_poli' => $nama_poli,
        );
        
        $model = new PoliModel();
        $result = $model->updateData($id_poli, $data);
            if($result){
                return redirect()->to('sirs/poli');
            }
            else{
                $session->setFlashdata('msg', '<b>Pastikan data yang diubah sudah benar!</b>');
            echo "Data gagal disimpan.";
            }
        }

        public function delete($id)
        {
            $model = new PoliModel();
            $result = $model->deleteData($id);
            if($result)
                return redirect()->to('sirs/poli');
            else
            echo "Data gagal dihapus.";
        }
        
}