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
            <div class=" p-0 col-sm-12 col-md-12 col-lg-8 ">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators consual-indikator-kanan ">
                        <button style="width: 10px;height: 10px;border-radius: 100%;" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button style="width: 10px;height: 10px;border-radius: 100%;" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button style="width: 10px;height: 10px;border-radius: 100%;" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="https://picsum.photos/600?1" class="d-block  mx-auto img400 " alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="https://picsum.photos/600?2" class="d-block  mx-auto img400" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/600?3" class="d-block  mx-auto img400" alt="...">
                        </div>
                    </div>

                </div>

            </div>
            <div class=" p-0 col-sm-12 col-md-12 col-lg-4 "><img src="https://picsum.photos/600?4" class="d-block  mx-auto img400" alt="..."></div>
        </div>

    </div>
</section>