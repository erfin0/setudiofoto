<section>
    <div class="container  mb-5">
        
        <div class="row row-cols-auto justify-content-around">
            <?php for ($i = 0; $i < 9; $i++) { ?>
                <div class="col my-3">
                    <div class="card  p-3">
                        <img src="https://picsum.photos/600?<?= $i ?>" class="d-block img20 " alt="...">
                        <div class="card-body mx-auto text-center">
                                                      
                                <a type="button" class="btn btn-dark px-4">BOOK NOW</a>
                            
                           
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>