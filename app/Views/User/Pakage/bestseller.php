<section>
    <div class="container  mb-5">
        <div class="px-5 mx-auto text-center mb-5 ">
            <h5 class=" mt-5 subname sarif text-uppercase">bestseller</h5>
        </div>
        <div class="row bg-secondary-subtle py-5">
            <div class="col-12">

                <div class="owl-carousel owl-theme owl-loaded ">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            <?php if (isset($paket)) {
                                foreach ($paket as $paketbes) { ?>
                                    <div class="owl-item">
                                        <div class="card  border border-0" style="width: 30rem">
                                            <img style="max-height: 20rem;width: auto;aspect-ratio: 1 / 1;object-fit: cover; " src="<?= $paketbes->ximage('max') ?>" />

                                            <div class="card-body mx-auto  text-over-image  text-center" style="margin-top: 10rem;">
                                                <h3><?= $paketbes->name ?></h3>
                                                <h5><?= $paketbes->jenis ?></h5>
                                                <p><?= $paketbes->keterangan ?></p>
                                                <h4> <?= number_to_currency($paketbes->harga, 'idr', 'id_ID') ?></h4>
                                                <a type="button" href="<?= base_url("pilihwaktu?paket=$paketbes->id") ?>" class="btn btn-dark px-4 ">BOOK NOW</a>


                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            items: 3,
            margin: 10,
            autoWidth: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            center: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });

    });
</script>