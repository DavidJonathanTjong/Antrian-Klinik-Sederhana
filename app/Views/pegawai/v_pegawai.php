<div class="d-flex justify-content-between align-items-center pt-3 mb-3 border-bottom container">
    <h4><?php echo $title ?></h4>
    <a href="<?php echo base_url('sirs/pegawai/add') ?>" class="btn btn-primary">Tambah</a>
</div>
<div class="table-responsive container">
    <table class="display nowrap" style="width:100%" id="tabelPegawai">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>NIK</th>
                <th>Jabatan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($getData as $row){?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row->nip ?></td>
                <td><?php echo $row->nama ?></td>
                <td><?php echo $row->jenis_kelamin ?></td>
                <td><?php echo $row->tanggal_lahir ?></td>
                <td><?php echo $row->nik ?></td>
                <td><?php echo $row->jabatan ?></td>
                <td>
                    <a href="<?php echo base_url('sirs/pegawai/edit/' .$row->nip) ?>"
                        class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?php echo base_url('sirs/pegawai/delete/' .$row->nip) ?>"
                        class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            <?php $i++;} ?>
        </tbody>

    </table>
</div>

<script>
new DataTable('#tabelPegawai', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>