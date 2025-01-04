<!-- Form Step 2-->
<?php echo form_open('parseAllData'); ?>

<div class="form-container" id="form-scheduling">
    <h5 class="mb-4">Penjadwalan</h5>
    <h6>Silahkan Masukan Tujuan Kunjungan Anda, Pasien <span><?= $pasien_data['nik'] ?></span> </h6>
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['nik'] ?>" name="nik">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['nomor_bpjs'] ?>" name="nomor_bpjs">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['nama'] ?>" name="nama">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['jenis_kelamin'] ?>"
        name="jenis_kelamin">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['tanggal_lahir'] ?>"
        name="tanggal_lahir">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['nomor_telepon'] ?>"
        name="nomor_telepon">
    <input type="text" readonly class="d-none form-control" value="<?= $pasien_data['email'] ?>" name="email">
    <?php echo csrf_field() ?>

    <div class="mb-3">
        <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
        <div class="row g-2">
            <input type="date" required class="form-control" name="tanggal_kunjungan" id="tanggal_kunjungan">
        </div>
    </div>
    <div class="mb-3">
        <label for="selectPoli" class="form-label">Metode Pembayaran</label>
        <select required id="selectPembayaran" class="form-select" name="metode_pembayaran">
            <option value="" selected disabled>Silahkan Pilih Metode Pembayaran</option>
            <option value="bpjs">BPJS</option>
            <option value="umum">Umum</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="selectPoli" class="form-label">Lokasi</label>
        <select id="selectLokasi" class="form-select" required name="nama_lokasi">
        </select>
    </div>
    <div class="mb-3">
        <label for="selectPoli" class="form-label">Poliklinik Tujuan</label>
        <select id="selectPoli" class="form-select" required name="nama_poli">
        </select>
    </div>
    <div class="mb-3">
        <label for="selectDokter" class="form-label">Dokter</label>
        <select id="selectDokter" class="form-select" required name="nama_dokter">
        </select>
    </div>
    <button type="submit" class="btn submit-btn w-100" id="btn-penjadwalan">Lanjut ></button>
</div>
<?php echo form_close(); ?>

<script>
$(document).ready(function() {
    $.ajax({
        url: '/rumahsakitpemweblan/public/get-lokasi',
        method: 'GET',
        success: function(response) {
            console.log('Data lokasi:', response);
            const lokasiDropdown = $('#selectLokasi');
            lokasiDropdown.empty();
            lokasiDropdown.append(
                '<option value="" selected disabled>Silahkan Pilih Lokasi Tujuan</option>');
            response.forEach(lokasi => {
                lokasiDropdown.append(
                    `<option value="${lokasi.id_lokasi}">${lokasi.nama_tempat}</option>`
                );
            });
        }
    });

    // Update poli berdasarkan lokasi yang dipilih
    $('#selectLokasi').on('change', function() {
        const lokasiId = $(this).val();
        $.ajax({
            url: '<?= base_url('get-poli') ?>',
            method: 'POST',
            data: {
                id_lokasi: lokasiId,
                // [crsfToken]: crsfHash
            },
            success: function(response) {
                console.log('Data Poli:', response);
                const poliDropdown = $('#selectPoli');
                poliDropdown.empty();
                poliDropdown.append(
                    '<option value="" selected disabled>Silahkan Pilih Poliklinik Tujuan</option>'
                );
                if (Array.isArray(response)) {
                    response.forEach(poli => {
                        poliDropdown.append(
                            `<option value="${poli.id_poli}">${poli.nama_poli}</option>`
                        );
                    });

                } else {
                    console.error('Format respons tidak valid.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error mendapatkan data poli:', status, error);
                alert('Gagal memuat data poli. Silakan coba lagi.');
            }
        });
    });

    function updateDokterDropdown() {
        const tanggalKunjungan = $('#tanggal_kunjungan').val();
        const idPoli = $('#selectPoli').val();
        if (!tanggalKunjungan || !idPoli) {
            return;
        }

        $.ajax({
            url: '<?= base_url('get-dokter') ?>',
            method: 'POST',
            data: {
                tanggal_kunjungan: tanggalKunjungan,
                id_poli: idPoli,
                // [crsfToken]: crsfHash
            },
            success: function(response) {
                console.log('Data Dokter:', response);
                const dokterDropdown = $('#selectDokter');
                dokterDropdown.empty();
                dokterDropdown.append(
                    '<option value="" selected disabled>Silahkan Pilih Dokter</option>');

                if (Array.isArray(response) && response.length > 0) {
                    response.forEach(dokter => {
                        dokterDropdown.append(
                            `<option value="${dokter.nip}">${dokter.nama_dokter}</option>`
                        );
                    });
                } else {
                    dokterDropdown.append(
                        '<option value="" disabled>Tidak ada dokter yang tersedia</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error mendapatkan data dokter:', status, error);
                alert('Dokter tidak tersedia pada tanggal tersebut. Silakan Pilih Tanggal lagi');
            }
        });
    }

    // Trigger saat tanggal atau poli berubah
    $('#tanggal_kunjungan, #selectPoli').on('change', updateDokterDropdown)
});
</script>