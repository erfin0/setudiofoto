<section id="testimoni">

    <div class="container mb-5 pt-3 bg-secondary-subtle">
        <div class="mt-3">
            <h3 class="text-center f01 text-capitalize">testimoni</h3>
        </div>
        <div class="row">
            <div class="col-12 ">
              
            <div class="owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        
                        <?php for ($i = 0; $i < 14; $i++) { ?>
                            <div class="owl-item">
                                <div class="card  border border-0 bg-transparent" style="width: 18rem;">
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
        </div>
    </div>

    </div>
</section>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            autoplay: true,
            autoWidth: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            margin: 100,
              nav: true,
            loop: true,
            responsiveClass: true,
            navText: ["<div class='nav-btn prev-slide'><i class='fa-solid fa-angle-left'></i></div>", "<div class='nav-btn next-slide'><i class='fa-solid fa-angle-right'></i></div>"],
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