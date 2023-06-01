<section>
    <div class="container  mb-5">
        <div class="px-5 mx-auto text-center mb-5 ">
            <h5 class=" mt-5 subname sarif text-uppercase">bestseller</h5>
        </div>
        <div class="row bg-secondary-subtle py-5">
            <div class="col-12">
                <div class="carousel-wrap">
                    <div class="owl-carousel owl-theme  " >
                        <?php for ($i = 0; $i < 3; $i++) { ?>
                            <div class="item">
                                <img style="height: 20rem;" src="https://picsum.photos/640?pic=<?= $i ?>" />
                                <span class="img-text">nightlife</span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            center:true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            margin: 100,
            autoWidth:true,
            nav: true,
            loop: true,
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