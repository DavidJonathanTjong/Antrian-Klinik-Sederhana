<?php echo form_open('sirs/pegawai/submit'); ?>
<div class="container">
    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->
    <div class="mb-3">
        <label for="inputNip" class="form-label">NIP:</label>
        <input type="number" class="form-control" required name="nip">
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
        <label for="nik" class="form-label">NIK:</label>
        <input type="text" class="form-control" name="nik">
    </div>
    <div class="mb-3">
        <label for="jabatan" class="form-label">Jabatan:</label>
        <input type="text" class="form-control" name="jabatan">
    </div>
    <div class="mb-3">
        <label for="id_pengguna" class="form-label">Masukan ID yang dibuat di tabel Pengguna:</label>
        <input type="text" class="form-control" name="id_pengguna">
    </div>
    <div class="d-flex">
        <div class="form-check">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <div class="form-check">
            <a type="button" class="btn btn-primary" href="<?php echo site_url('sirs/pegawai') ?>">Cancel</a>
        </div>
    </div>
</div>

<?php echo form_close(); ?>