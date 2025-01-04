<div class="d-flex justify-content-between align-items-center pt-3 mb-3 border-bottom container">
    <h4><?php echo $title ?></h4>
    <div class="d-flex">
        <a href="<?php echo base_url('sirs/penjadwalan?status=hadir') ?>"
            class="btn btn-secondary mr-4 <?php echo ($status === 'hadir') ? 'active' : '' ?>">Pasien Hadir</a>
        <a href="<?php echo base_url('sirs/penjadwalan?status=tidak hadir') ?>"
            class="btn btn-secondary mr-4 <?php echo ($status === 'tidak hadir') ? 'active' : '' ?>">Pasien Tidak
            Hadir</a>
        <a href="<?php echo base_url('sirs/penjadwalan/add') ?>" class="btn btn-primary">Tambah</a>
    </div>

</div>
<div class="table-responsive container">
    <table class="display nowrap" style="width:100%" id="tabelPenjadwalan">
        <thead>
            <tr>
                <th>ID Penjadwalan</th>
                <th>ID Pasien</th>
                <th>ID Antrian</th>
                <th>Pembayaran</th>
                <th>Status Penjadwalan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($getData)): ?>
            <?php foreach ($getData as $row): ?>
            <tr>
                <td><?php echo $row->id_kunjungan ?></td>
                <td><?php echo $row->id_pasien ?></td>
                <td><?php echo $row->id_antrian ?></td>
                <td><?php echo $row->pembayaran ?></td>
                <td><?php echo $row->status_kunjungan ?></td>
                <td>
                    <a href="<?php echo base_url('sirs/penjadwalan/update/' .$row->id_kunjungan) ?>"
                        class="btn btn-sm btn-success">Hadir</a>
                    <a href="<?php echo base_url('sirs/penjadwalan/delete/' .$row->id_kunjungan) ?>"
                        class="btn btn-sm btn-danger">Batalkan</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Tidak ada data tersedia</td>
            </tr>
            <?php endif; ?>
        </tbody>

    </table>
</div>
<script>
new DataTable('#tabelPenjadwalan', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>