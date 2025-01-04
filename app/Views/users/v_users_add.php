<?php echo form_open('sirs/users/submit'); ?>
<div class="container">
    <!-- Flash Message -->
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <!-- end flash messege -->
    <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" name="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="mb-3">
        <label for="inputNama" class="form-label">Role:</label>
        <select class="form-select mb-3" aria-label="Default select example" name="role">
            <option value="admin" selected>Admin</option>
            <option value="hrd">Hrd</option>
        </select>
    </div>
    <div class="d-flex">
        <div class="form-check">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <div class="form-check">
            <a type="button" class="btn btn-primary" href="<?php echo site_url('sirs/users') ?>">Cancel</a>
        </div>
    </div>
</div>

<?php echo form_close(); ?>