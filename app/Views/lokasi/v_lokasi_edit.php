<?php echo form_open('sirs/ruangan/update'); ?>
<div class="col-8 mx-auto container">

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->
    <input type="text" name="id_lokasi" readonly class="form-control d-none" value="<?php echo $getData->id_lokasi ?>">

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Nama Tempat</label>
        <div class="col-sm-9">
            <input type="text" name="nama_tempat" class="form-control" value="<?php echo $getData->nama_tempat ?>">
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
            <a type="submit" class="btn btn-secondary" href="<?php echo site_url('sirs/ruangan')?>">Cancel</a>
        </div>
    </div>

</div>