<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Testimoni' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<section>
    <div class="container  mb-5">
        <div class="px-5 mx-auto text-center mb-5 ">
            <h5 class=" mt-5  sarif">Testimoni</h5>
        </div>
        <div class="row justify-content-evenly">
            <?php for ($i = 0; $i < 3; $i++) { ?>
                <div class="col-12 col-sm-12 col-md-6 col-xl-4 col-xxl-4 d-flex justify-content-center">
                    <div class="card mt-3 border border-0 bg-secondary-subtle p-3" style="width: 18rem;">
                        <img src="https://picsum.photos/600?<?= $i ?>" class="d-block img20 " alt="...">
                        <div class="card-body  text-center">

                            <p class="sarif text-light card-text">XXXXXXXXXXXX</p>


                        </div>
                    </div>
                </div>
            <?php } ?>
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
                        <div class="">...</div>
                        <?php for ($i = 0; $i < 14; $i++) { ?>
                            <div class="owl-item">
                                <div class="card  border border-0" style="width: 18rem;">
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
        margin: 10,
        items: 3,
        loop: true,
        margin: 100,
        autoWidth:true,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        center:true,
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