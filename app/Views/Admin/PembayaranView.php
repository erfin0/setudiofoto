<?= $this->extend('/layout/' . setting('Aplikasi.layoutAdmin')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'pembayaran' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="card" style="height: 9rem;">
    <div class="card-body">
        <h5 class="card-title">
            <i class="fa-regular fa-credit-card"></i> Daftar pembayaran
        </h5>

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
                        <th>Tanggal </th>
                        <th>Pesanan dari</th>
                        <th>Paket </th>
                        <th>Waktu </th>
                        <th>Total Harga</th>
                        <th>Sudah dibayar</th>
                        <th>Status</th>
                        <th>Approve</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
</div>




<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="modalbody" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
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
                "url": "<?= site_url('/admin/tabel/pembayaran') ?>",
                "type": "POST",
                "data": function(data) {},
            },
            "columnDefs": [{
                    "targets": [0],
                    "width": "4%"
                }, {
                    "targets": [2],
                    "width": "10%"
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

    function tampilbukti(id) {
        $("#modalbody").html('');
        $.get("pembayaran/"+id, function(data) {
            $("#modalbody").html(data);            
        });       
        $('#staticBackdrop').modal('show');
    }
</script>

<?= $this->endSection() ?>