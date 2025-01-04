<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kunjungan Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jadwal Kunjungan Anda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="header">NAMA PASIEN</div>
                    <div class="banner-img">
                        <img src="<?php echo base_url('images/foto-awal2.jpeg') ?>" alt="Image 1" class="img-fluid">
                    </div>
                    <div class="dates">
                        <div><strong>Mulai:</strong> <span>12:30</span> JAN 2015</div>
                        <div><strong>Selesai:</strong> <span>14:30</span> JAN 2015</div>
                    </div>
                    <div class="stats">
                        <div class="container"><strong>Dokter:</strong> 3098</div>
                        <div class="container"><strong>Pembayaran:</strong> 562</div>
                        <div class="container"><strong>Nomor Antrian:</strong> 182</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>