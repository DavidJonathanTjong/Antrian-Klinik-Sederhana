<div class="d-flex justify-content-between align-items-center pt-3 mb-3 border-bottom container">
    <h4><?php echo $title ?></h4>
    <a href="<?php echo base_url('sirs/dokter/add') ?>" class="btn btn-primary">Tambah</a>
</div>
<div class="table-responsive container">
    <table class="display nowrap" style="width:100%" id="tabelDokter">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>NPA IDI</th>
                <th>Nama </th>
                <th>No. Telpon</th>
                <th>Email</th>
                <th>ID Poli</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($getData as $row){?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row->nip ?></td>
                <td><?php echo $row->npa_idi ?></td>
                <td><?php echo $row->nama ?></td>
                <td><?php echo $row->nomor_telepon ?></td>
                <td><?php echo $row->email ?></td>
                <td><?php echo $row->id_poli ?></td>
                <td>
                    <a href="<?php echo base_url('sirs/dokter/edit/' .$row->nip) ?>"
                        class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?php echo base_url('sirs/dokter/delete/' .$row->nip) ?>"
                        class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            <?php $i++;} ?>
        </tbody>

    </table>
</div>

<script>
new DataTable('#tabelDokter', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>