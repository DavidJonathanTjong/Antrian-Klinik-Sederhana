<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Online RS Ilkom Banjarbaru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        color: #333;
    }

    h1 {
        color: #FF6A00;
        font-size: 3rem;
        font-weight: bold;
    }

    h2,
    h3 {
        color: #FF6A00;
    }

    .info-card {
        margin-bottom: 20px;
    }

    .call-center {
        background: #FFFFFF;
        border-radius: 10px;
        padding: 20px;
    }

    .call-center img {
        max-width: 100%;
        border-radius: 10px;
    }

    .check-in {
        background: #F5F5F5;
        border-radius: 10px;
        padding: 20px;
    }

    .time {
        color: #FF6A00;
        font-weight: bold;
    }

    .infowaktu {
        background: #ffc448;
    }

    .img-dokter {
        max-width: 100%;
        object-fit: cover;
    }

    .but-daftar {
        border: none;
        color: white;
        padding: 10px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        border-radius: 4px;
    }

    @media (max-width: 768px) {
        .embed-responsive-item {
            width: 400px;
            height: 400px;
        }
    }

    .tile {
        width: 100%;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0px 2px 3px -1px rgba(151, 171, 187, 0.7);
        float: left;
        transform-style: preserve-3d;
        margin: 10px 5px;
    }

    .header {
        border-bottom: 1px solid #ebeff2;
        padding: 19px 0;
        text-align: center;
        color: #59687f;
        font-size: 600;
        font-size: 19px;
        position: relative;
    }

    .banner-img {
        padding: 5px 5px 0;
    }

    .banner-img img {
        width: 100%;
        border-radius: 5px;
    }

    .dates {
        border: 1px solid #ebeff2;
        border-radius: 5px;
        padding: 20px 0px;
        margin: 10px 20px;
        font-size: 16px;
        color: #5aadef;
        font-weight: 600;
        overflow: auto;
    }

    .dates div {
        float: left;
        width: 50%;
        text-align: center;
        position: relative;
    }

    .stats {
        border-top: 1px solid #ebeff2;
        background: #f7f8fa;
        overflow: auto;
        padding: 15px 0;
        font-size: 16px;
        color: #59687f;
        font-weight: 600;
        border-radius: 0 0 5px 5px;
    }

    .footer {
        text-align: right;
        position: relative;
        margin: 20px 5px;
    }

    .footer a {
        padding: 10px 25px;
        margin: 10px 2px;
        text-transform: uppercase;
        font-weight: bold;
        text-decoration: none;
        border-radius: 3px;
    }

    .footer a.btn-primary {
        background-color: #5AADF2;
        color: #FFF;
    }

    .footer a.btn-danger {
        background-color: #fc5a5a;
        color: #FFF;
    }
    </style>
</head>

<body>
    <div class="container my-5">
        <!-- Header Section -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 text-center ">
                <img src="<?php echo base_url('images/foto-awal1.png') ?>" alt="Doctor Illustration" class="img-dokter">
            </div>
            <div class="col-md-6">
                <?php if (session()->getFlashdata('pesanRegis')): ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('pesanRegis'); ?>
                </div>
                <?php endif; ?>
                <p class="mb-2 mt-4"><b>Keselamatan Pasien Kami Utamakan</b></p>
                <h1>Registrasi Online RS Ilkom Banjarbaru</h1>
                <p>Rumah Sakit Ilkom Banjarbaru membuka registrasi online bagi para calon pasien
                    maupun pasien untuk mendaftarkan pertemuan dengan dokter</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-sm mb-4 info-card">
                            <div class="card-body text-center">
                                <h3 style="text-align: left;">Pasien BPJS</h3>
                                <a class="btn-primary but-daftar" style="text-align: left; display: block;"
                                    href="<?php echo site_url('regis-online/old') ?>">
                                    <img src="<?php echo base_url('images/insurance.png') ?>" alt="Logo BPJS"
                                        style="width: 20px; height: 20px; vertical-align: middle; margin-right: 5px;">
                                    Daftar Sekarang
                                </a>
                                <p style="text-align: left;">Registrasi bagi pasien peserta BPJS yang
                                    melakukan pemeriksaan rawat jalan dengan jaminan BPJS Kesehatan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-sm mb-4 info-card">
                            <div class="card-body text-center icon icon-3">
                                <h3 style="text-align: left;">Pasien Umum</h3>
                                <a class="btn-primary but-daftar" style="text-align: left; display: block;"
                                    href="<?php echo site_url('regis-online/old') ?>">
                                    <img src="<?php echo base_url('images/logo-daftar1.png') ?>" alt="Logo BPJS"
                                        style="width: 20px; height: 20px; vertical-align: middle; margin-right: 5px;">
                                    Daftar Sekarang
                                </a>

                                <p style="text-align: left;">Registrasi bagi pasien umum yang telah memiliki nomor rekam
                                    medis dan ingin melakukan pemeriksaan rawat jalan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row call-center mb-4 align-items-center">
            <div class="col-md-3 infowaktu">
                <h2 style="color: white;"><b>Call Center</b></h2>
                <p><b>087810331584</b></p>
            </div>
            <div class="col-md-6 text-center">
                <img src="<?php echo base_url('images/foto-awal2.jpeg') ?>" alt="Doctor Illustration" class="img-fluid">
            </div>
            <div class="col-md-3 infowaktu">
                <h4 style="color: white;"><b>Beroperasi pada jam</b></h2>
                    <p><b>08.00 s.d 17.00 WITA</b></p>
            </div>
        </div>

        <div class="check-in">
            <div class="row">
                <div class="col-md-5 col-12 mb-4">
                    <div class="mb-4">
                        <h3 class="fw-bold">Check-in Time</h3>
                        <p><span class="text-primary">30 Minutes Before Appointment</span></p>
                        <p>
                            Pasien yang sudah melakukan pendaftaran online dan akan melakukan pemeriksaan dapat datang
                            maksimal 30 menit sebelum jadwal untuk melakukan pendaftaran ulang.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4>Cek Jadwal Anda</h4>
                        <?php echo form_open('cekjadwalpasien'); ?>
                        <?php echo csrf_field() ?>
                        <div class="mb-3">
                            <label for="nik-jadwal" class="form-label">Masukkan Nomor NIK</label>
                            <input type="text" id="nik-jadwal" class="form-control" name="nikJadwal"
                                placeholder="Masukkan NIK Anda">
                        </div>
                        <button type="submit" class="btn btn-primary">Cek Jadwal</button>
                        <?php echo form_close(); ?>
                        <?php if (session()->getFlashdata('msg')): ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?php echo session()->getFlashdata('msg'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-7 col-12">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d995.6527104157383!2d114.84133444726469!3d-3.444436266503319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de681102c14624b%3A0x539edae0f9d2cb2e!2sCampus%20II%20-%20Faculty%20of%20Mathematics%20and%20Natural%20Sciences%2C%20University%20of%20Lambung%20Mangkurat!5e0!3m2!1sen!2sid!4v1733579005518!5m2!1sen!2sid"
                            allowfullscreen="" loading="lazy" width="600" height="450" style="border:0;">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <?php if (isset($jadwal)): ?>
    <div class="modal fade show" id="jadwalModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"
        aria-hidden="true" style="display: block;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Jadwal Kunjungan Anda</h5>
                    <a href="<?= base_url() ?>" class="btn-close" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <div class="header"><?= $jadwal->nama_pasien ?></div>
                    <div class="banner-img">
                        <img src="<?php echo base_url('images/gambarjadwal.jpg') ?>" alt="Image 1" class="img-jadwal">
                    </div>
                    <div class="dates">
                        <div><strong>Mulai:</strong> <span> <?= $jadwal->jam_antrian ?></span> Tanggal:
                            <?= $jadwal->tanggal_kunjungan ?></div>
                        <div><strong>Selesai:</strong> <span>30 Menit Setelah Masuk Ruangan</span></div>
                    </div>
                    <div class="stats">
                        <div class="container"><strong>Dokter:</strong> <?= $jadwal->nama_dokter ?></div>
                        <div class="container"><strong>Pembayaran:</strong><?= $jadwal->pembayaran ?></div>
                        <div class="container"><strong>Nomor Antrian:</strong> <?= $jadwal->nomor_antrian ?></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url() ?>" class="btn btn-secondary">Tutup</a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>