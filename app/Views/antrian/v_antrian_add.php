<?php echo form_open('sirs/antrian/submit'); ?>
<div class="container">
    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->

    <div class="mb-3">
        <label for="id_dokter" class="form-label">NIP Dokter:</label>
        <input type="number" class="form-control" name="id_dokter">
    </div>
    <div class="mb-3">
        <label for="id_lokasi" class="form-label">ID Lokasi:</label>
        <input type="number" class="form-control" name="id_lokasi">
    </div>
    <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal Kunjungan:</label>
        <input type="date" class="form-control" name="tanggal" required>
    </div>
    <div class="d-flex">
        <div class="form-check">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <div class="form-check">
            <a type="button" class="btn btn-primary" href="<?php echo site_url('sirs/antrian') ?>">Cancel</a>
        </div>
    </div>
</div>

<?php echo form_close(); ?>