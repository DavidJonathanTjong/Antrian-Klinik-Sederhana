<?php echo form_open('sirs/users/update'); ?>
<div class="col-8 mx-auto container">

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->
    <input type="text" name="id_pengguna" readonly class="form-control d-none"
        value="<?php echo $getData->id_pengguna ?>">

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Username</label>
        <div class="col-sm-9">
            <input type="text" name="username" class="form-control" required value="<?php echo $getData->username ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-9">
            <input type="password" name="password" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Role</label>
        <select class="form-select" aria-label="Default select example" name="role">
            <option value="admin" <?php echo ($getData->role === 'admin') ? 'selected' : ''; ?>>
                Admin</option>
            <option value="hrd" <?php echo ($getData->role === 'hrd') ? 'selected' : ''; ?>>
                Hrd</option>
        </select>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6 offset-sm-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6 offset-sm-3">
            <a type="submit" class="btn btn-secondary" href="<?php echo site_url('sirs/users')?>">Cancel</a>
        </div>
    </div>

</div>