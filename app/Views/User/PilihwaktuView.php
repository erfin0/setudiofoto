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
    <div class="container  mb-5  ">

        <div class="row justify-content-evenly">

            <?php
            $today = date('Y-m-d');
            $con = 1;
            $a = true;
            while ($con <= 8) {
                $date = date('Y-m-d', strtotime('+' . $con . ' days', strtotime($today))); ?>
                <a href="<?=base_url("/booking?tgl=$date") ?>"  class="btn p-3 zoom rounded-2 border col text-center <?= ($con==3)? 'border border-danger':'' ?>" style="background-color: var(<?= $a ? '--bs-secondary-bg' : '--bs-primary-bg-subtle' ?>);">
                    <?= date('d M', strtotime($date)) ?> <br>
                    <?= date('D', strtotime($date)) ?>
                </a>
            <?php $a = !$a;
                $con++;
            }
            ?>
        </div>
    </div>
    <div class="container  mb-5 ">

        <div class="row justify-content-evenly">
           

        </div>
    </div>
    <a type="button" href="<?= base_url("pilihwaktu?paket=$terpilih->id") ?>" class="btn btn-dark px-4  ">BOOK NOW</a>
</section>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>


<?= $this->endSection() ?>