<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Testimoni' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>

<style>
    .photo-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 10px;
    }

    .photo-gallery img {
        width: 100%;
        height: auto;
    }
</style>


<section>
    <div class="container mb-5">
        <div class="px-5 mx-auto text-center ">
            <p class=" mt-5 mb-0 sarif text-uppercase"><?= setting()->get('aplikasi.slogan') ?></p>
            <p class="logoname sarif text-uppercase"><?= setting()->get('aplikasi.perusahaan') ?></p>
            <a type="button" class="btn btn-dark px-4">BOOK NOW</a>

        </div>

    </div>

</section>


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

<section>
    <div class="container  mb-5  py-3">
        <div class="bg-secondary-subtle py-4 ">
            <div class="owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <?php
                        if (isset($poto)) {
                            foreach ($poto as $pt) {
                        ?>
                                <div class="owl-item">
                                    <div class="card bg-secondary-subtle border border-0 p-1">
                                        <img src="<?= $pt->ximage('max') ?>" class="d-block img20" alt="...">
                                        <div class="card-body text-center ">
                                            <p class=" sarif card-text"><?= $pt->keterangan ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
                <div class="owl-nav">
                    <div class="owl-prev">prev</div>
                    <div class="owl-next">next</div>
                </div>
                <!--   <div class="owl-dots">
                    <div class="owl-dot active"><span></span></div>
                    <div class="owl-dot"><span></span></div>
                    <div class="owl-dot"><span></span></div>
                </div>
            </div> -->
            </div>
        </div>
</section>
<section>
    <div class="container  mb-5">
        <div class="row justify-content-evenly">
            <?php
            if (isset($poto)) {
                foreach ($poto as $pt) {
            ?>
                    <div class="col-12 col-sm-12 col-md-6 col-xl-4 col-xxl-4 d-flex justify-content-center">
                        <div class="card mt-3 border border-0 bg-secondary-subtle p-3">
                            <img src="<?= $pt->ximage('max') ?>" class="d-block img20 " alt="...">
                            <div class="card-body  text-center">
                                <p class="sarif  card-text"><?= $pt->keterangan ?></p>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</section>


<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel();
    });
    $('.owl-carousel').owlCarousel({
        loop: true,
        items: 3,
        margin: 10,
        // autoWidth: true,
        autoplay: true,
        autoplayTimeout: 2300,
        autoplayHoverPause: true,
        center: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 3,
                nav: true,
                /* loop: false */
            }
        }
    })
</script>

<?= $this->endSection() ?>