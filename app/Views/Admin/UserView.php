<?= $this->extend('/layout/' . setting('Aplikasi.layoutAdmin')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'List user' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="card" style="height: 9rem;">
    <div class="card-body">
        <h5 class="card-title">
            <i class="fa-solid fa-user"></i> Daftar User
        </h5>


    </div>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="row bg-body py-3">

        <div class="table-responsive">
            <table class="table  table-bordered" id="tabeladmin">
                <thead>
                    <tr>
                        <th> email </th>
                        <th> username </th>
                        <th> whatsapp </th>
                        <th> address </th>
                        <th> #</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
</div>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>
<script>
    $(document).ready(function() {
        // $('#tabeladmin').DataTable();
        table = $('#tabeladmin').DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                "url": "<?= site_url('/admin/tabel/users') ?>",
                "type": "POST",
                "data": function(data) {
                    data.user='user';
                },
            },
            /*  "columnDefs": [{
                     "targets": [0],
                     "width": "4%"
                 }, {
                     "targets": [2],
                     "width": "10%",
                     orderable: false,
                 },
                 {
                     responsivePriority: 1,
                     targets: 2
                 },
                 {
                     responsivePriority: 0,
                     targets: 0
                 },
             ], */
            responsive: true,
        });
    });

    function terpilih(e) {
        ury = "<?= base_url('admin/admin/') ?>" + $(e).attr('data-id') + "/edit";
        window.location.href = ury;
    }
</script>

<?= $this->endSection() ?>