<?= $this->extend('/layout/' . setting('Aplikasi.layoutAdmin')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Paket' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <i class="fa-solid fa-calendar-days"></i> Daftar paket
        </h5>
        <a type="button" href="<?= base_url('admin/paket/new') ?>" class="btn btn-dark mt-5 float-end"><i class="fa-solid fa-calendar-days"></i> Add Paket</a>

    </div>
</div>
<div class="container-fluid px-4 mt-3">
    <?php if (session('error') !== null) : ?>
        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
    <?php elseif (session('errors') !== null) : ?>
        <div class="alert alert-danger" role="alert">
            <?php if (is_array(session('errors'))) : ?>
                <?php foreach (session('errors') as $error) : ?>
                    <?= $error ?>
                    <br>
                <?php endforeach ?>
            <?php else : ?>
                <?= session('errors') ?>
            <?php endif ?>
        </div>
    <?php endif ?>

    <?php if (session('message') !== null) : ?>
        <div class="alert alert-success" role="alert"><?= session('message') ?></div>
    <?php endif ?>
    <div class="row bg-body py-3">

        <div class="table-responsive">
            <table class="table  table-bordered" id="tabeladmin">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>jenis</th>
                        <th>max peserta</th>
                        <th>harga</th>
                        <th>harga perpeserta</th>
                        <th>keterangan</th>
                        <th>max_time</th>
                        <th> # </th>
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

        table = $('#tabeladmin').DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                "url": "<?= site_url('/admin/tabel/paket') ?>",
                "type": "POST",
                "data": function(data) {},
            },
            "columnDefs": [{
                    "targets": [0],
                    "width": "4%"
                }, {
                    "targets": [7],
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
            ],
            responsive: true,
        });


    });

    function del(id) {
        if (confirm('Are you sure delete this data?')) {
            $.ajax({
                url: '<?= base_url("admin/paket/") ?>' + id,
                type: 'DELETE',
                success: function(result) {
                    table.ajax.reload(null, false);
                },
                error: function(xhr) {
                    alert('tidak bisa menghapus');
                   
                }
            });
        }
    }
</script>

<?= $this->endSection() ?>