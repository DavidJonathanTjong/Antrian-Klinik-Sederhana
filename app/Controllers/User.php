<?php

namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController
{
    public function index(){
        $model = new UserModel();
        $data = [
            'title' => 'Pengguna',
            'content' => 'users/v_users',
            'getData' => $model->getAllData()
        ];
        return view('template', $data);
    }

    public function tambahform(){
        helper('form');
        $data = [
            'title' => 'Tambah Pengguna',
            'content' => 'users/v_users_add',
        ];
        return view('template', $data);
    }

    public function submit(){
        $session = session();
        $id_pengguna = $this->request->getPost('id_pengguna');
        $password = $this->request->getPost('password');
        $hashedPassword = sha1($password);
        $data = array(
            'id_pengguna' =>$id_pengguna,
            'username' => $this->request->getPost('username'),
            'password' => $hashedPassword,
            'role' => $this->request->getPost('role'),
        );
        
        $model = new UserModel();
        if ($model->isPenggunaAvailable($id_pengguna)) {
            $session->setFlashdata('msg', '<b>ID Pengguna sudah ada</b>');
            return redirect()->to('sirs/users/add');
        }

        $result = $model->insertData($data);
        if($result){
            return redirect()->to('sirs/users');
        }else{
            $session->setFlashdata('msg', '<b>Gagal Menyimpan Data</b>');
            return redirect()->to('sirs/users/add');
        }
    }

    public function edit($id){
        helper('form');
        $model = new UserModel();
        $data = [
            'title' => 'Ubah User',
            'content' => 'users/v_users_edit',
            'getData' => $model->getDataById($id)
        ];
        return view('template', $data);
    }

    public function update(){
        $session = session();
        $id_pengguna = $this->request->getPost('id_pengguna');
        $username = $this->request->getPost('username');
        $password  =$this->request->getPost('password');
        $role  =$this->request->getPost('role');

        $hashedPassword = sha1($password);

        $data = array(
            'id_pengguna' => $id_pengguna,
            'username' => $username,
            'password' => $hashedPassword,
            'role' => $role,
        );
        
        $model = new UserModel();

        $result = $model->updateData($id_pengguna, $data);
            if($result){
                return redirect()->to('sirs/users');
            }
            else{
                $session->setFlashdata('msg', '<b>Pastikan data yang diubah sudah benar!</b>');
            echo "Data gagal disimpan.";
            }
        }

        public function delete($id)
        {
            $model = new UserModel();
            $result = $model->deleteData($id);
            if($result)
                return redirect()->to('sirs/users');
            else
            echo "Data gagal dihapus.";
        }
        
}