<div class="d-flex justify-content-between align-items-center pt-3 mb-3 border-bottom container">
    <h4><?php echo $title ?></h4>
    <a href="<?php echo base_url('sirs/jadwaldokter/add') ?>" class="btn btn-primary">Tambah</a>
</div>
<div class="table-responsive container">
    <table class="display nowrap" style="width:100%" id="tabelJadwal">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>Hari</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($getData as $row){?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row->id_dokter ?></td>
                <td><?php echo $row->hari ?></td>
                <td><?php echo $row->waktu_mulai ?></td>
                <td><?php echo $row->waktu_selesai ?></td>
                <td>
                    <a href="<?php echo base_url('sirs/jadwaldokter/edit/' .$row->id_jadwal) ?>"
                        class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?php echo base_url('sirs/jadwaldokter/delete/' .$row->id_jadwal) ?>"
                        class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            <?php $i++;} ?>
        </tbody>

    </table>
</div>

<script>
new DataTable('#tabelJadwal', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>