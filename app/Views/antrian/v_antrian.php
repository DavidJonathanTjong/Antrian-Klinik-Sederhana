<div class="d-flex justify-content-between align-items-center pt-3 mb-3 border-bottom container">
    <h4><?php echo $title ?></h4>
    <a href="<?php echo base_url('sirs/antrian/add') ?>" class="btn btn-primary">Tambah</a>
</div>
<div class="table-responsive container">
    <table class="display nowrap" style="width:100%" id="tabelAntrian">
        <thead>
            <tr>
                <th>ID Antrian</th>
                <th>Nomor Antrian</th>
                <th>ID Lokasi</th>
                <th>Dokter</th>
                <th>Tanggal</th>
                <th>Jam Antrian</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getData as $row){?>
            <tr>
                <td><?php echo $row->id_antrian ?></td>
                <td><?php echo $row->nomor_antrian ?></td>
                <td><?php echo $row->id_lokasi ?></td>
                <td><?php echo $row->id_dokter ?></td>
                <td><?php echo $row->tanggal ?></td>
                <td><?php echo $row->jam_antrian?></td>
                <td>
                    <a href="<?php echo base_url('sirs/antrian/delete/' .$row->id_antrian) ?>"
                        class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>

<script>
new DataTable('#tabelAntrian', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>