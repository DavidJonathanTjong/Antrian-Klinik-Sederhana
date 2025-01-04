<?php echo form_open('sirs/jadwaldokter/update'); ?>
<div class="col-8 mx-auto container">

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->
    <input type="hidden" name="id_jadwal" readonly class="form-control d-none"
        value="<?php echo $getData->id_jadwal ?>">

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">NIP Dokter</label>
        <div class="col-sm-9">
            <input type="number" name="id_dokter" class="form-control" value="<?php echo $getData->id_dokter ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Hari</label>
        <select class="form-select" aria-label="Default select example" name="hari">
            <option value="Senin" <?php echo ($getData->hari === 'Senin') ? 'selected' : ''; ?>>
                Senin</option>
            <option value="Selasa" <?php echo ($getData->hari === 'Selasa') ? 'selected' : ''; ?>>
                Selasa</option>
            <option value="Rabu" <?php echo ($getData->hari === 'Rabu') ? 'selected' : ''; ?>>
                Rabu</option>
            <option value="Kamis" <?php echo ($getData->hari === 'Kamis') ? 'selected' : ''; ?>>
                Kamis</option>
            <option value="Jumat" <?php echo ($getData->hari === 'Jumat') ? 'selected' : ''; ?>>
                Jumat</option>
            <option value="Sabtu" <?php echo ($getData->hari === 'Sabtu') ? 'selected' : ''; ?>>
                Sabtu</option>
            <option value="Minggu" <?php echo ($getData->hari === 'Minggu') ? 'selected' : ''; ?>>
                Minggu</option>
        </select>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Waktu Mulai</label>
        <div class="col-sm-9">
            <input type="time" name="waktu_mulai" class="form-control" value="<?php echo $getData->waktu_mulai ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Waktu Selesai</label>
        <div class="col-sm-9">
            <input type="time" name="waktu_selesai" class="form-control" value="<?php echo $getData->waktu_selesai ?>">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6 offset-sm-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6 offset-sm-3">
            <a type="submit" class="btn btn-secondary" href="<?php echo site_url('sirs/jadwaldokter')?>">Cancel</a>
        </div>
    </div>

</div>