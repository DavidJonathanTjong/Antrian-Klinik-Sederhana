<?php echo form_open('sirs/pasien/submit'); ?>
<div class="container">
    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->
    <div class="mb-3">
        <label for="inputNip" class="form-label">NIK:</label>
        <input type="number" class="form-control" name="nik">
    </div>
    <div class="mb-3">
        <label for="inputNip" class="form-label">Nomor BPJS:</label>
        <input type="number" class="form-control" name="nomor_bpjs">
    </div>
    <div class="mb-3">
        <label for="inputNama" class="form-label">Nama:</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="mb-3">
        <label for="inputNama" class="form-label">Jenis Kelamin:</label>
        <select class="form-select mb-3" aria-label="Default select example" name="jenis_kelamin">
            <option value="Laki-Laki" selected>Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tgl Lahir:</label>
        <input type="date" class="form-control" name="tanggal_lahir">
    </div>
    <div class="mb-3">
        <label for="nik" class="form-label">Nomor Telepon:</label>
        <input type="text" class="form-control" name="nomor_telepon">
    </div>
    <div class="mb-3">
        <label for="jabatan" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="d-flex">
        <div class="form-check">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <div class="form-check">
            <a type="button" class="btn btn-primary" href="<?php echo site_url('sirs/pasien') ?>">Cancel</a>
        </div>
    </div>
</div>

<?php echo form_close(); ?>