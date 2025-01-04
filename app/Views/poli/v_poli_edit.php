<?php echo form_open('sirs/poli/update'); ?>
<div class="col-8 mx-auto container">

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">ID POLI</label>
        <div class="col-sm-9">
            <input type="text" name="id_poli" class="form-control" value="<?php echo $getData->id_poli ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Nama POLI</label>
        <div class="col-sm-9">
            <input type="text" name="nama_poli" class="form-control" value="<?php echo $getData->nama_poli ?>">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6 offset-sm-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6 offset-sm-3">
            <a type="submit" class="btn btn-secondary" href="<?php echo site_url('sirs/poli')?>">Cancel</a>
        </div>
    </div>

</div>