<!-- Form Step 1 Pasien Baru -->
<?php echo form_open('tambah-pasienbaru'); ?>
<div id="form-new-patient" class="form-container">
    <h5 class="mb-4">Identitas Pasien Baru</h5>
    <div class="mb-3">
        <label for="namaPas" class="form-label">Nama Pasien</label>
        <input type="text" class="form-control" id="namaPas" placeholder="Nama Pasien" name="nama_pasien" required>
    </div>
    <div class="mb-3">
        <label for="nik" class="form-label">NIK Pasien</label>
        <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" required>
    </div>
    <div class="mb-3">
        <label for="noBPJS" class="form-label">Nomor BPJS (Opsional)</label>
        <input type="text" class="form-control" id="noBPJS" placeholder="BPJS / JKN" name="nomor_bpjs">
    </div>
    <div class="mb-3">
        <label for="inputNama" class="form-label">Jenis Kelamin:</label>
        <select class="form-select mb-3" aria-label="Default select example" name="jenis_kelamin" required>
            <option value="Laki-Laki" selected>Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="noTelp" class="form-label">Nomor Telepon</label>
        <input type="number" class="form-control" id="noTelp" placeholder="Nomor Telepon" name="nomor_telepon" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="tanggalLahirBaru" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggalLahirBaru" name="tanggal_lahir" required>
    </div>
    <button id="btnLanjutPasienBaru" type="submit" class="btn submit-btn w-100">Lanjut ></button>
</div>