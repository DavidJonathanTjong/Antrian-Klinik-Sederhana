<!-- KONFIRMASI STEP 3 -->
<?php echo form_open('konfirmasiregis', ['id' => 'formKonfirmasi']); ?>
<?php echo csrf_field() ?>
<div class="container" id="form-confirmation">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['nik'] ?>" name="nik">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['nomor_bpjs'] ?>" name="nomor_bpjs">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['nama'] ?>" name="nama">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['jenis_kelamin'] ?>"
        name="jenis_kelamin">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['tanggal_lahir'] ?>"
        name="tanggal_lahir">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['nomor_telepon'] ?>"
        name="nomor_telepon">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['nama_lokasi'] ?>"
        name="nama_lokasi">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['nama_poli'] ?>" name="nama_poli">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['tanggal_kunjungan'] ?>"
        name="tanggal_kunjungan">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['nama_dokter'] ?>"
        name="nama_dokter">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['metode_pembayaran'] ?>"
        name="metode_pembayaran">

    <div class="table-custom">
        <table class="table table-bordered table-striped mb-0">
            <tbody>
                <tr>
                    <th scope="row">Nama Pasien</th>
                    <td><?= $pasien_data['nama'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Jenis Kelamin</th>
                    <td><?= $pasien_data['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <th scope="row">NIK Pasien</th>
                    <td><?= $pasien_data['nik'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Tanggal Lahir</th>
                    <td><?= $pasien_data['tanggal_lahir'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Kontak Pasien</th>
                    <td><?= $pasien_data['nomor_telepon'] ?></td>
                </tr>

                <tr>
                    <th scope="row">No. BPJS (Opsional)</th>
                    <td><?= $pasien_data['nomor_bpjs'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Cara Bayar</th>
                    <td><?= $pasien_data['metode_pembayaran'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Dokter</th>
                    <td><?= $pasien_data['nama_dokter'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Lokasi Tujuan</th>
                    <td><?= $pasien_data['nama_lokasi'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Poliklinik Tujuan</th>
                    <td><?= $pasien_data['nama_poli'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Tanggal Kunjungan</th>
                    <td><?= $pasien_data['tanggal_kunjungan'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex mt-2">
        <button type="button" class="btn btn-success me-2" id="btnKonfirmasi">Simpan</button>
        <a type="submit" class="btn btn-danger" href="<?php echo site_url('regis-online/old')?>">Cancel</a>
    </div>

</div>

<script>
document.getElementById('btnKonfirmasi').addEventListener('click', function(event) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Pastikan data sudah benar sebelum mendaftar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formKonfirmasi').submit();
        }
    });
});
</script>