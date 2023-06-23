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

<section id="galery">
    <div class="container mb-5 pt-3 d-flex flex-wrap">
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="<?= isset($poto[0]) ? $poto[0]->ximage('max') : 'https://picsum.photos/600?1' ?>" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
                <img src="<?= isset($poto[1]) ? $poto[1]->ximage('max') : 'https://picsum.photos/600?2' ?>" class="w-100 shadow-1-strong rounded mb-4" alt="Wintry Mountain Landscape" />
            </div>

            <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="<?= isset($poto[2]) ? $poto[2]->ximage('max') : 'https://picsum.photos/600?3' ?>" class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />
                <img src="<?= isset($poto[3]) ? $poto[3]->ximage('max') : 'https://picsum.photos/600?4' ?>" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
            </div>

            <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="<?= isset($poto[4]) ? $poto[4]->ximage('max') : 'https://picsum.photos/600?5' ?>" class="w-100 shadow-1-strong rounded mb-4" alt="Waves at Sea" />
                <img src="<?= isset($poto[5]) ? $poto[5]->ximage('max') : 'https://picsum.photos/600?6' ?>" class="w-100 shadow-1-strong rounded mb-4" alt="Yosemite National Park" />
            </div>
        </div>
    </div>
</section>








<section>
    <div class="container  mb-5  py-3">
        <div class="mx-auto text-center mb-5 ">
            <h5 class="til sarif ">Apa Kata Mereka?</h5>
        </div>


        <div class=" bg-secondary-subtle py-4 ">
            <div class="owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">

                        <?php for ($i = 0; $i < 14; $i++) { ?>
                            <div class="owl-item">
                                <div class="card  border border-0 p-1" style="width: 18rem;">
                                    <img src="https://picsum.photos/600?<?= $i ?>" class="card-img-top" alt="...">
                                    <div class="card-body text-center ">
                                        <p class=" sarif card-text">xxxxxxxxxxxxxxx</p>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
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
            <?php for ($i = 0; $i < 3; $i++) { ?>
                <div class="col-12 col-sm-12 col-md-6 col-xl-4 col-xxl-4 d-flex justify-content-center">
                    <div class="card mt-3 border border-0 bg-secondary-subtle p-3" style="width: 18rem;">
                        <img src="https://picsum.photos/600?<?= $i + 3 ?>" class="d-block img20 " alt="...">
                        <div class="card-body  text-center">

                            <p class="sarif text-light card-text">XXXXXXXXXXXX</p>


                        </div>
                    </div>
                </div>
            <?php } ?>
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
        autoWidth: true,
        autoplay: true,
        autoplayTimeout: 1000,
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