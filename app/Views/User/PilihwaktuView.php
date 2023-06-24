<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Pilih waktu' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<section>
    <div class="container  mb-5 ">
        <div class="row ">
            <div class="col-12 col-sm-12 col-md-6 col-xl-4 mt-5 ">
                <div class="card text-start h-100" style="max-height: 20rem;overflow: hidden;">
                    <img class="card-img-top" src="<?= $terpilih->ximage('max') ?>" alt="<?= $terpilih->name ?>">

                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-8 mt-5 ">
                <div class="card text-start h-100">

                    <div class="card-body">
                        <h3><?= $terpilih->name ?></h3>
                        <h5><?= $terpilih->jenis ?></h5>
                        <p><?= $terpilih->keterangan ?></p>
                        <h4 class="mb-5"> <?= number_to_currency($terpilih->harga, 'idr', 'id_ID') ?></h4>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container  mb-5 bg-secondary-subtle py-3">

        <div class="row justify-content-evenly">
        <a type="button" href="<?= base_url("pilihwaktu?paket=$terpilih->id") ?>" class="btn btn-dark px-4 btboking">BOOK NOW</a>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>


<?= $this->endSection() ?>