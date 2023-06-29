<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Pesanan' ?>
<?= $this->endSection() ?>
<?= $this->section('pageStyles') ?>


<link rel="stylesheet" href="<?= base_url() ?>vendors/DataTables-1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?= base_url() ?>vendors/Responsive-2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet" />

<?= $this->endSection() ?>
<?= $this->section('main') ?>
<div class="container mb-5 ">

    <div class="px-5 mx-auto ">
        <h1 class=" mt-5 f-sarabon f-b text-uppercase">My Transactions</h1>
    </div>
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

    <div class="my-5 f-el">
        <table class="table  table-bordered" id="tabeladmin">
            <thead>
                <tr>
                    <th>Tanggal </th>
                    <th>Daftar booking </th>
                    <th>Status </th>
                    <th>action </th>
                    <th>testimoni </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>

<script src="<?= base_url() ?>vendors/DataTables-1.13.4/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>vendors/DataTables-1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>vendors/Responsive-2.4.1/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>vendors/Responsive-2.4.1/js/responsive.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        table = $('#tabeladmin').DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                "url": "<?= site_url('tabel/transaksi') ?>",
                "type": "POST",
                "data": function(data) {},
            },
            "columnDefs": [{
                    "targets": [3],
                    "width": "10%",
                    "orderable": false
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
   
</script>
<?= $this->endSection() ?>