<?php echo form_open('sirs/dokter/update'); ?>
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
            <input type="number" name="nip" class="form-control" required value="<?php echo $getData->nip ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">NPA IDI</label>
        <div class="col-sm-9">
            <input type="number" name="npa_idi" class="form-control" value="<?php echo $getData->npa_idi ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Nama</label>
        <div class="col-sm-9">
            <input type="text" name="nama" class="form-control" value="<?php echo $getData->nama ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Nomor Telepon</label>
        <div class="col-sm-9">
            <input type="text" name="nomor_telepon" class="form-control" value="<?php echo $getData->nomor_telepon ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
            <input type="email" name="email" class="form-control" value="<?php echo $getData->email ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">ID Poli</label>
        <div class="col-sm-9">
            <input type="number" name="id_poli" class="form-control" value="<?php echo $getData->id_poli ?>">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6 offset-sm-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6 offset-sm-3">
            <a type="submit" class="btn btn-secondary" href="<?php echo site_url('sirs/dokter')?>">Cancel</a>
        </div>
    </div>

</div>