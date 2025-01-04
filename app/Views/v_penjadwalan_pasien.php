<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
    .stepper-wrapper {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .stepper-item {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;

        @media (max-width: 768px) {
            font-size: 12px;
        }
    }

    .stepper-item::before {
        position: absolute;
        content: "";
        border-bottom: 2px solid #ccc;
        width: 100%;
        top: 20px;
        left: -50%;
        z-index: 2;
    }

    .stepper-item::after {
        position: absolute;
        content: "";
        border-bottom: 2px solid #ccc;
        width: 100%;
        top: 20px;
        left: 50%;
        z-index: 2;
    }

    .stepper-item .step-counter {
        position: relative;
        z-index: 5;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #ccc;
        margin-bottom: 6px;
    }

    .stepper-item.active {
        font-weight: bold;
    }

    .stepper-item.completed .step-counter {
        background-color: #4bb543;
    }

    .stepper-item.completed::after {
        position: absolute;
        content: "";
        border-bottom: 2px solid #4bb543;
        width: 100%;
        top: 20px;
        left: 50%;
        z-index: 3;
    }

    .stepper-item:first-child::before {
        content: none;
    }

    .stepper-item:last-child::after {
        content: none;
    }


    .tab-header {
        display: flex;
        background-color: #629f9c;
        border-radius: 5px 5px 0 0;
    }

    .tab-header button {
        flex: 1;
        padding: 10px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        color: white;
        cursor: pointer;
        background-color: #629f9c;
    }

    .tab-header .active {
        background-color: #008000;
    }

    .form-container {
        border: 1px solid #ccc;
        border-radius: 0 0 5px 5px;
        background: white;
        padding: 20px;
    }

    .submit-btn {
        background-color: #008000;
        color: white;
    }

    .submit-btn:hover {
        background-color: #006f00;
    }
    </style>

</head>

<body>
    <?php $currentURL = current_url(); ?>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo site_url('/')?>">
                <img src="<?php echo base_url('images/ULMicon.jpg') ?>" alt="Logo" width="30" height="30"
                    class="d-inline-block align-text-top">
                Rumah Sakit Ilkom Banjarbaru
            </a>
            <button class="btn btn-outline-success ms-auto" type="button" data-bs-toggle="modal"
                data-bs-target="#loginModal">Login</button>
        </div>
    </nav>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <?php if (session()->getFlashdata('pesanlogin')): ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?php echo session()->getFlashdata('pesanlogin'); ?>
                        </div>
                        <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const loginModal = new bootstrap.Modal(document.getElementById("loginModal"));
                            loginModal.show();
                        });
                        </script>
                        <?php endif; ?>
                        <?php echo form_open('login'); ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter your username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter your password">
                        </div>
                        <button type="submit" class="btn btn-success w-100">Login</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">ILKOM Hospital - Banjarbaru</h1>
                <p>Sistem daftar pasien online untuk Rumah Sakit Ilkom Banjarbaru</p>
                <p>
                    Pilih jadwal praktek Dokter yang ingin Anda kunjungi. Anda dapat melakukan
                    <span class="fw-bold text-primary">"Cancel"</span> atau
                    <span class="fw-bold text-primary">"Reschedule"</span> dengan menghubungi nomor wa kami
                </p>
                <p class="mb-3">
                    <a href="https://wa.me/6287810331584" class="text-primary fw-bold" target="_blank">
                        +62 078 1033 1584 (link)
                    </a>
                </p>
                <p>Jika ada pertanyaan, jangan ragu untuk mengklik link WhatsApp di atas untuk langsung menghubungi
                    customer relations officer kami.</p>
                <p class="fst-italic text-muted">
                    If you have any questions, please do not hestitate to use the special WhatsApp links above to
                    contact our customer relations officer.
                </p>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div id="step1" class="stepper-wrapper">
            <div
                class="stepper-item <?php echo ($currentURL == site_url('regis-online/old')) ? 'active completed' : ''; ?> <?php echo ($currentURL == site_url('regis-online/new')) ? 'active completed' : ''; ?>
                <?php echo ($currentURL == site_url('regis-online/step2')) ? 'active completed' : ''; ?> <?php echo ($currentURL == site_url('regis-online/step3')) ? 'active completed' : ''; ?>">
                <div class="step-counter">1</div>
                <div class="step-name">Informasi Anda</div>
            </div>
            <div id="step2" class="stepper-item <?php echo ($currentURL == site_url('regis-online/step2')) ? 'active completed' : ''; ?> 
                <?php echo ($currentURL == site_url('regis-online/step3')) ? 'active completed' : ''; ?>"
                id="step-scheduling">
                <div class="step-counter">2</div>
                <div class="step-name">Penjadwalan</div>
            </div>
            <div id="step3"
                class="stepper-item <?php echo ($currentURL == site_url('regis-online/step3')) ? 'active completed' : ''; ?>"
                id="step-confirmation">
                <div class="step-counter">3</div>
                <div class="step-name">Konfirmasi</div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="mx-auto" style="max-width: 800px;">
            <!-- Header Tabs -->
            <div class="tab-header">
                <a id="btn-old-patient" class="btn active" href="<?php echo site_url('regis-online/old') ?>">Pendaftaran
                    Pasien Lama</a>
                <a id="btn-new-patient" class="btn" href="<?php echo site_url('regis-online/new') ?>">Pendaftaran Pasien
                    Baru</a>
            </div>
            <div id="content">
                <?php echo view($content) ?>

            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnOldPatient = document.getElementById("btn-old-patient");
        const btnNewPatient = document.getElementById("btn-new-patient");

        const formOldPatient = document.getElementById("form-old-patient");
        const formNewPatient = document.getElementById("form-new-patient");

        btnOldPatient.addEventListener("click", function() {
            btnOldPatient.classList.add("active");
            btnNewPatient.classList.remove("active");

            formOldPatient.style.display = "block"; // Tampilkan form pasien lama
            formNewPatient.style.display = "none";
        });

        btnNewPatient.addEventListener("click", function() {
            btnNewPatient.classList.add("active");
            btnOldPatient.classList.remove("active");

            formNewPatient.style.display = "block"; // Tampilkan form pasien baru
            formOldPatient.style.display = "none";
        });


    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>