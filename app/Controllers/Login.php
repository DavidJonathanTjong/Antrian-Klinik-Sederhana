<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\DokterModel;
use App\Models\PasienModel;
use App\Models\PenjadwalanModel;
use App\Models\UserModel;
use DateTime;

class Login extends BaseController{

    public function index(){   
        $modelPasien = new PasienModel();
        $modelDokter = new DokterModel();
        $modelUser = new UserModel();
        
        $kunjunganModel = new PenjadwalanModel();

        $jumlahPasienAktif = $modelPasien->getJumlahPasienAktif();
        $jumlahPending = $kunjunganModel->getJumlahKunjunganPending();
        $kunjunganDaily = $kunjunganModel->kunjunganHarian();
        $kunjunganMonthly = $kunjunganModel->kunjunganBulanan();

        $jumlahDokter =$modelDokter->getJumlahDokter();;
        $jumlahAdmin= $modelUser->getJumlahAdmin();;
        $jumlahHrd= $modelUser->getJumlahHRD();;

        $dataKunjungan = $kunjunganModel->kunjunganPerBulan();
        $kunjunganPerBulan = array_fill_keys(
            ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            0
        );
        foreach ($dataKunjungan as $data) {
            $namaBulan = DateTime::createFromFormat('!m', $data['bulan'])->format('F');
            $namaBulanIndo = $this->translateMonthToIndonesian($namaBulan);
            $kunjunganPerBulan[$namaBulanIndo] = $data['jumlah_kunjungan'];
        }

        $session = session();
        $username = $session->get('username');

        // dd($jumlahAdmin);
        $data = [
            'title' => 'Dashboard',
            'content' => 'dashboard',
            'jumlahPasienAktif' => $jumlahPasienAktif,
            'jumlahPending' => $jumlahPending,
            'jumlahDokter' => $jumlahDokter,
            'jumlahAdmin' => $jumlahAdmin,
            'jumlahHrd' => $jumlahHrd,
            'kunjunganDaily' => $kunjunganDaily,
            'kunjunganMonthly' => $kunjunganMonthly,
            'kunjunganPerBulan' => $kunjunganPerBulan,
            'namaUser' => $username,
        ];
        return view('template', $data);
    }

    private function translateMonthToIndonesian($month){
        $months = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember',
        ];
        return $months[$month] ?? $month;
    }

    public function auth(){
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $model = new AuthModel();
        $data = $model ->checkData($username, sha1($password));
        if($data){
            $sessdata = [
                'username' => $data->username,
                'role'     => $data->role,
                'logged_in' => TRUE
            ];
            $session->set($sessdata);
            return redirect()->to('sirs/dashboard');
        }else{
            $session->setFlashdata('pesanlogin', '<b>Password Salah</b>');
            return redirect()->to('/regis-online/old');
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
    
}