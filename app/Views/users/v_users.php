<div class="d-flex justify-content-between align-items-center pt-3 mb-3 border-bottom container">
    <h4><?php echo $title ?></h4>
    <a href="<?php echo base_url('sirs/users/add') ?>" class="btn btn-primary">Tambah</a>
</div>
<div class="container">
    <table id="tabelPengguna" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID Pengguna</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getData as $row){?>
            <tr>
                <td><?php echo $row->id_pengguna ?></td>
                <td><?php echo $row->username ?></td>
                <td><?php echo $row->password ?></td>
                <td><?php echo $row->role ?></td>
                <td>
                    <a href="<?php echo base_url('sirs/users/edit/' .$row->id_pengguna) ?>"
                        class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?php echo base_url('sirs/users/delete/' .$row->id_pengguna) ?>"
                        class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>

<script>
new DataTable('#tabelPengguna', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>