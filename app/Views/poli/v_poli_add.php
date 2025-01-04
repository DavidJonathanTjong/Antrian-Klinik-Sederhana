<?php echo form_open('sirs/poli/submit'); ?>
<div class="container">
    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->
    <div class="mb-3">
        <label for="username" class="form-label">ID POLI:</label>
        <input type="number" class="form-control" name="id_poli">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Nama Poli:</label>
        <input type="text" class="form-control" name="nama_poli">
    </div>
    <div class="d-flex">
        <div class="form-check">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <div class="form-check">
            <a type="button" class="btn btn-primary" href="<?php echo site_url('sirs/poli') ?>">Cancel</a>
        </div>
    </div>
</div>

<?php echo form_close(); ?>