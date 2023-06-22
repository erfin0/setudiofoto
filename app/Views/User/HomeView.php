<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'home' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<section>


    <div class="container mb-5">
        <div class="px-5 mx-auto text-center ">
            <p class=" mt-5 mb-0 sarif text-uppercase"><?= setting()->get('aplikasi.slogan') ?></p>
            <p class="logoname sarif text-uppercase"><?= setting()->get('aplikasi.perusahaan') ?></p>
            <a type="button" class="btn btn-dark px-4">BOOK NOW</a>

        </div>
    </div>

    <div class="container mb-5">


        <div class="row">
            <?php if (isset($potohider)) { ?>
                <div class=" p-0 col-sm-12 col-md-12 col-lg-8 ">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators consual-indikator-kanan ">
                            <?php for ($i = 0; $i < count($potohider); $i++) { ?>
                                <button style="width: 10px;height: 10px;border-radius: 100%;" type="button" <?= ($i == 0) ? 'class="active" aria-current="true"' : '' ?> data-bs-target="#carouselExampleInterval" data-bs-slide-to="<?= $i ?>" aria-current="true" aria-label="Slide <?= $i ?>"></button>
                            <?php } ?>
                        </div>

                        <div class="carousel-inner">
                            <?php
                            $a = true;
                            foreach ($potohider as $potox) { ?>
                                <div class="carousel-item <?= ($a) ? 'active' : '' ?>" data-bs-interval="10000">
                                    <img src="<?= $potox->ximage('max') ?> " class="d-block  mx-auto img400 " alt="...">
                                    <div class="text-over-image d-none d-md-block">
                                        <h1><?= $potox->judul ?></h1>
                                        <p><?= $potox->keterangan ?></p>
                                    </div>
                                  
                                </div>
                            <?php $a = false;
                            } ?>
                        </div>

                    </div>

                </div>
            <?php } ?>
            <div class=" p-0 col-sm-12 col-md-12 col-lg-4 "><img src="https://picsum.photos/600?4" class="d-block  mx-auto img400" alt="..."></div>
        </div>

    </div>

</section>

<?= $this->include('/User/testimoni') ?>





<?php if (isset($poto)) {
    if (count($poto) > 5) { ?>

        <section id="galery">
            <!-- Gallery -->
            <div class="container mb-5 pt-3 d-flex flex-wrap">
                <div class="row">


                    <div class="col-lg-4  my-2 mb-lg-0">
                        <img src="<?= $poto[0]->ximage('max') ?>" class="w-100 shadow-1-strong rounded mb-4" style="object-fit: cover;width: 100%;height: 100%;max-height: 35%;" />
                        <img src="<?= $poto[1]->ximage('max') ?>" class="w-100 shadow-1-strong rounded mb-4" style="object-fit: cover;width: 100%;height: 100%;max-height: 65%;" />
                    </div>
                    <div class="col-lg-4  my-2 mb-lg-0">
                        <img src="<?= $poto[2]->ximage('max') ?>" class="w-100 shadow-1-strong rounded mb-4" style="object-fit: cover;width: 100%;height: 100%;max-height: 65%;" />
                        <img src="<?= $poto[3]->ximage('max') ?>" class="w-100 shadow-1-strong rounded mb-4" style="object-fit: cover;width: 100%;height: 100%;max-height: 35%;" />
                    </div>
                    <div class="col-lg-4  my-2 mb-lg-0">
                        <img src="<?= $poto[4]->ximage('max') ?>" class="w-100 shadow-1-strong rounded mb-4" style="object-fit: cover;width: 100%;height: 100%;max-height: 35%;" />
                        <img src="<?= $poto[5]->ximage('max') ?>" class="w-100 shadow-1-strong rounded mb-4" style="object-fit: cover;width: 100%;height: 100%;max-height: 65%;" />
                    </div>

                </div>
                <div class="text-over-image">
                    <p class=" subname text-center sarif text-uppercase m-0">galery</p>
                </div>
            </div>
            <!-- Gallery -->
        </section>
<?php }
} ?>

<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>


<?= $this->endSection() ?>