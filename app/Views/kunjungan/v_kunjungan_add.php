<?php echo form_open('sirs/penjadwalan/submit'); ?>
<div class="container">
    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->

    <div class="mb-3">
        <label for="id_dokter" class="form-label">ID Pasien:</label>
        <input type="number" class="form-control" name="id_pasien">
    </div>
    <div class="mb-3">
        <label for="id_lokasi" class="form-label">ID Antrian (Buat ID dulu di tabel antrian jika belum):</label>
        <input type="number" class="form-control" name="id_antrian">
    </div>
    <div class="mb-3">
        <label for="hari" class="form-label">Pembayaran:</label>
        <select class="form-select mb-3" aria-label="Default select example" name="pembayaran">
            <option value="bpjs" selected>BPJS</option>
            <option value="umum">Umum</option>
        </select>
    </div>

    <div class="d-flex">
        <div class="form-check">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <div class="form-check">
            <a type="button" class="btn btn-primary" href="<?php echo site_url('sirs/penjadwalan') ?>">Cancel</a>
        </div>
    </div>
</div>

<?php echo form_close(); ?>