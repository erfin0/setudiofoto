<section id="testimoni">

    <div class="container mb-5 pt-3 bg-secondary-subtle">
        <div class="mt-3">
            <h3 class="text-center f01 text-capitalize">testimoni</h3>
        </div>
        <div class="row">
            <div class="col-12 ">
                <div class="carousel-wrap">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="https://picsum.photos/640/480?pic=1" />
                            <span class="img-text">nightlife</span>
                        </div>
                        <div class="item">
                            <img src="https://picsum.photos/640/480?pic=2" />
                            <span class="img-text">abstract</span>
                        </div>
                        <div class="item">
                            <img src="https://picsum.photos/640/480?pic=3" />
                            <span class="img-text">animals</span>
                        </div>
                        <div class="item">
                            <img src="https://picsum.photos/640/480?pic=4" />
                            <span class="img-text">nature</span>
                        </div>
                        <div class="item">
                            <img src="https://picsum.photos/640/480?pic=5" />
                            <span class="img-text">business</span>
                        </div>
                        <div class="item">
                            <img src="https://picsum.photos/640/480?pic=6" />
                            <span class="img-text">cats</span>
                        </div>
                        <div class="item">
                            <img src="https://picsum.photos/640/480?pic=7" />
                            <span class="img-text">city</span>
                        </div>
                        <div class="item">
                            <img src="https://picsum.photos/640/480?pic=8" />
                            <span class="img-text">food</span>
                        </div>
                        <div class="item">
                            <img src="https://picsum.photos/640/480?pic=9" />
                            <span class="img-text">fashion</span>
                        </div>
                        <div class="item">
                            <img src="https://picsum.photos/640/480?pic=10" />
                            <span class="img-text">people</span>
                        </div>
                        <div class="item">
                            <img src="https://picsum.photos/640/480?pic=11" />
                            <span class="img-text">sports</span>
                        </div>
                        <div class="item">
                            <img src="https://picsum.photos/640/480?pic=12" />
                            <span class="img-text">technics</span>
                        </div>
                        <div class="item">
                            <img src="https://picsum.photos/640/480?pic=13" />
                            <span class="img-text">transport</span>
                        </div>
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
            autoplay: true,
            autoplayTimeout: 1000,
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