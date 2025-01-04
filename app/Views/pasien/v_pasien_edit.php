<?php echo form_open('sirs/pasien/update'); ?>
<div class="col-8 mx-auto container">

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->
    <input type="hidden" name="id_pasien" readonly class="form-control d-none"
        value="<?php echo $getData->id_pasien ?>">

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">NIK</label>
        <div class="col-sm-9">
            <input type="number" name="nik" class="form-control" value="<?php echo $getData->nik ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Nomor BPJS</label>
        <div class="col-sm-9">
            <input type="number" name="nomor_bpjs" class="form-control" value="<?php echo $getData->nomor_bpjs ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Nama</label>
        <div class="col-sm-9">
            <input type="text" name="nama" class="form-control" value="<?php echo $getData->nama ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
        <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
            <option value="Laki-Laki" <?php echo ($getData->jenis_kelamin === 'Laki-Laki') ? 'selected' : ''; ?>>
                Laki-Laki</option>
            <option value="Perempuan" <?php echo ($getData->jenis_kelamin === 'Perempuan') ? 'selected' : ''; ?>>
                Perempuan</option>
        </select>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-9">
            <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $getData->tanggal_lahir ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Nomor Telepon</label>
        <div class="col-sm-9">
            <input type="number" name="nomor_telepon" class="form-control"
                value="<?php echo $getData->nomor_telepon ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
            <input type="email" name="email" class="form-control" value="<?php echo $getData->email ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Status Pasien</label>
        <select class="form-select" aria-label="Default select example" name="status">
            <option value="aktif" <?php echo ($getData->status === 'aktif') ? 'selected' : ''; ?>>
                Aktif</option>
            <option value="tidak aktif" <?php echo ($getData->status === 'tidak aktif') ? 'selected' : ''; ?>>
                Tidak Aktif</option>
        </select>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6 offset-sm-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6 offset-sm-3">
            <a type="submit" class="btn btn-secondary" href="<?php echo site_url('sirs/pasien')?>">Cancel</a>
        </div>
    </div>

</div>