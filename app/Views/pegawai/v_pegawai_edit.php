<?php echo form_open('sirs/pegawai/update'); ?>
<div class="col-8 mx-auto container">

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">NIP</label>
        <div class="col-sm-9">
            <input type="number" name="nip" class="form-control" value="<?php echo $getData->nip ?>">
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
        <label class="col-sm-3 col-form-label">NIK</label>
        <div class="col-sm-9">
            <input type="text" name="nik" class="form-control" required value="<?php echo $getData->nik ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Jabatan</label>
        <div class="col-sm-9">
            <input type="text" name="jabatan" class="form-control" value="<?php echo $getData->jabatan ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">ID_Pengguna</label>
        <div class="col-sm-9">
            <input type="text" name="id_pengguna" class="form-control" value="<?php echo $getData->id_pengguna ?>">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6 offset-sm-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6 offset-sm-3">
            <a type="submit" class="btn btn-secondary" href="<?php echo site_url('sirs/pegawai')?>">Cancel</a>
        </div>
    </div>

</div>