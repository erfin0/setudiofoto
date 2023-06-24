<section>
    <div class="container  mb-5">
        <div class="px-5 mx-auto text-center mb-5 ">
            <h5 class=" mt-5  sarif">Choose your best package</h5>
        </div>
        <div class="row  row-cols-auto justify-content-around">
            <?php if (isset($best)){ foreach($best as $paketbes)  { ?>
                <div class="col-12 col-lg-4 mb-3" >
                    <div class="card p-3 h-100">
                        <img src="<?=$paketbes->ximage('max') ?>" class="d-block img20 " style="height:auto;" alt="<?=$paketbes->name ?>">
                        <div class="card-body mx-auto text-center">
                                  <h3><?=$paketbes->name ?></h3>
                                  <h5><?=$paketbes->jenis ?></h5>
                                  <p><?=$paketbes->keterangan ?></p>  
                                  <h4 class="mb-5"> <?= number_to_currency($paketbes->harga, 'idr', 'id_ID') ?></h4>                  
                                <a type="button" href="<?=base_url("pilihwaktu?paket=$paketbes->id")?>" class="btn btn-dark px-4 btboking">BOOK NOW</a>
                            
                           
                          
                           
                        </div>
                    </div>
                </div>
            <?php } } ?>
        </div>
    </div>
</section>