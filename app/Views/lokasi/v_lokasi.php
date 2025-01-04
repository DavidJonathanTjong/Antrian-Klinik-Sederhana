<div class="d-flex justify-content-between align-items-center pt-3 mb-3 border-bottom container">
    <h4><?php echo $title ?></h4>
    <a href="<?php echo base_url('sirs/ruangan/add') ?>" class="btn btn-primary">Tambah</a>
</div>
<div class="table-responsive container">
    <table class="display nowrap" style="width:100%" id="tabelLokasi">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Lokasi</th>
                <th>Nama Tempat</th>
                <th>ID Poli</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($getData as $row){?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row->id_lokasi ?></td>
                <td><?php echo $row->nama_tempat ?></td>
                <td><?php echo $row->id_poli ?></td>
                <td>
                    <a href="<?php echo base_url('sirs/ruangan/edit/' .$row->id_lokasi) ?>"
                        class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?php echo base_url('sirs/ruangan/delete/' .$row->id_lokasi) ?>"
                        class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            <?php $i++;} ?>
        </tbody>

    </table>
</div>
<script>
new DataTable('#tabelLokasi', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>