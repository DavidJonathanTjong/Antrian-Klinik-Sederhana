<?php echo form_open('sirs/dokter/submit'); ?>
<div class="container">
    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->
    <div class="mb-3">
        <label for="nip" class="form-label">NIP:</label>
        <input type="number" class="form-control" name="nip" required>
    </div>
    <div class="mb-3">
        <label for="npa_idi" class="form-label">NPA IDI:</label>
        <input type="number" class="form-control" name="npa_idi">
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama:</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="mb-3">
        <label for="nomor_telepon" class="form-label">Nomor Telpon:</label>
        <input type="text" class="form-control" name="nomor_telepon">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label for="id_poli" class="form-label">ID Poli:</label>
        <input type="number" class="form-control" name="id_poli">
    </div>
    <div class="d-flex">
        <div class="form-check">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <div class="form-check">
            <a type="button" class="btn btn-primary" href="<?php echo site_url('sirs/dokter') ?>">Cancel</a>
        </div>
    </div>
</div>

<?php echo form_close(); ?>