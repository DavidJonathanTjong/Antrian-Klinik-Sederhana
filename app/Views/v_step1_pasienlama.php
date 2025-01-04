<!-- Form Step 1 Pasien Lama -->
<?php echo form_open('cekpasien')?>

<div id="form-old-patient" class="form-container">
    <h5 class="mb-4">Identitas Pasien Lama</h5>
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
    </div>
    <?php endif; ?>
    <div class="mb-3">
        <label for="nikPasLama" class="form-label">NIK</label>
        <input type="text" class="form-control" id="nikPasLama" name="nik" placeholder="NIK">
    </div>
    <div class="mb-3">
        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggalLahir" name="tanggal_lahir">
    </div>
    <button id="btnLanjutPasienLama" type="submit" class="btn submit-btn w-100">Lanjut ></button>
</div>