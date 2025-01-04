<div class="d-flex justify-content-between align-items-center pt-3 mb-3 border-bottom container">
    <h4><?php echo $title ?></h4>
    <a href="<?php echo base_url('sirs/pasien/add') ?>" class="btn btn-primary">Tambah</a>
</div>
<div class="table-responsive container">
    <table class="display nowrap" style="width:100%" id="tabelPasien">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIK</th>
                <th>No. BPJS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>No. Telepon</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getData as $row){?>
            <tr>
                <td><?php echo $row->id_pasien ?></td>
                <td><?php echo $row->nik ?></td>
                <td><?php echo $row->nomor_bpjs ?></td>
                <td><?php echo $row->nama ?></td>
                <td><?php echo $row->jenis_kelamin ?></td>
                <td><?php echo $row->tanggal_lahir ?></td>
                <td><?php echo $row->nomor_telepon ?></td>
                <td><?php echo $row->email ?></td>
                <td><?php echo $row->status ?></td>
                <td>
                    <a href="<?php echo base_url('sirs/pasien/edit/' .$row->id_pasien) ?>"
                        class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?php echo base_url('sirs/pasien/delete/' .$row->id_pasien) ?>"
                        class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>

<script>
new DataTable('#tabelPasien', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>