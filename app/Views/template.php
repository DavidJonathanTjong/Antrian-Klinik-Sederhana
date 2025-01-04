<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistem Informasi Rumah Sakit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <!-- dataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>

    <style>
    .table {
        word-wrap: break-word;
        white-space: nowrap;
    }
    </style>

</head>

<body id="page-top">
    <?php $currentURL = current_url(); ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIRS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo ($currentURL == site_url('sirs/dashboard')) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo site_url('sirs/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengelolaan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php echo ($currentURL == site_url('sirs/pasien')) ? 'active' : ''; ?>">
                <a class=" nav-link" href="<?php echo site_url('sirs/pasien') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pasien</span></a>
            </li>

            <li class="nav-item <?php echo ($currentURL == site_url('sirs/users')) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo site_url('sirs/users') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pengguna</span></a>
            </li>

            <li class="nav-item <?php echo ($currentURL == site_url('sirs/pegawai')) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo site_url('sirs/pegawai') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pegawai</span></a>
            </li>
            <li class="nav-item <?php echo ($currentURL == site_url('sirs/dokter')) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo site_url('sirs/dokter') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Dokter</span></a>
            </li>
            <li class="nav-item <?php echo ($currentURL == site_url('sirs/poli')) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo site_url('sirs/poli') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Poli</span></a>
            </li>
            <li class="nav-item <?php echo ($currentURL == site_url('sirs/ruangan')) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo site_url('sirs/ruangan') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Ruangan</span></a>
            </li>
            <li class="nav-item <?php echo ($currentURL == site_url('sirs/jadwaldokter')) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo site_url('sirs/jadwaldokter') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Jadwal Dokter</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Antrian
            </div>


            <!-- Nav Item - Charts -->
            <li class="nav-item <?php echo ($currentURL == site_url('sirs/antrian')) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo site_url('sirs/antrian') ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Antrian</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php echo ($currentURL == site_url('sirs/penjadwalan')) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo site_url('sirs/penjadwalan') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Penjadwalan</span></a>
            </li>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo base_url('images/ULMicon.jpg') ?>" alt="Logo" width="30" height="30"
                            class="d-inline-block align-text-top">
                        <span class="text-gray-600 small">Sistem Informasi Rumah Sakit Ilkom Banjarbaru</span>

                    </a>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="me-2 d-none d-lg-inline text-gray-600 small">USER</span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url('images/undraw_profile.svg') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- isi konten -->
                <?php if (session()->getFlashdata('msg')): ?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg'); ?>
                </div>
                <?php endif; ?>
                <?php echo view($content) ?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Rumah Sakit ILKOM ULM by David Jonathan Tjong</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo site_url('sirs/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('assets/js/demo/chart-area-demo.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/demo/chart-pie-demo.js') ?>"></script>

</body>

</html>