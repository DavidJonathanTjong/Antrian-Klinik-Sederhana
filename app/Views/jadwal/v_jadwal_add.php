<?php echo form_open('sirs/jadwaldokter/submit'); ?>
<div class="container">
    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->
    <div class="mb-3">
        <label for="inputNip" class="form-label">NIP Dokter:</label>
        <input type="number" class="form-control" name="id_dokter">
    </div>
    <div class="mb-3">
        <label for="hari" class="form-label">Hari Bekerja:</label>
        <select class="form-select mb-3" aria-label="Default select example" name="hari">
            <option value="Senin" selected>Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
            <option value="Sabtu">Sabtu</option>
            <option value="Minggu">Minggu</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="waktu_mulai" class="form-label">Waktu Mulai:</label>
        <input type="time" class="form-control" name="waktu_mulai">
    </div>
    <div class="mb-3">
        <label for="waktu_selesai" class="form-label">Waktu Selesai:</label>
        <input type="time" class="form-control" name="waktu_selesai">
    </div>

    <div class="d-flex">
        <div class="form-check">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <div class="form-check">
            <a type="button" class="btn btn-primary" href="<?php echo site_url('sirs/jadwaldokter') ?>">Cancel</a>
        </div>
    </div>
</div>

<?php echo form_close(); ?>