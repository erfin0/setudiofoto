<?= $this->extend('/layout/' . setting('Aplikasi.layoutAdmin')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Pembayaran' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="container mb-5 ">
    <div class="px-5 mx-auto text-center ">
        <h1 class=" mt-5 f-sarabon f-b text-uppercase">pembayaran</h1>
    </div>

    
<?php if (session('error') !== null) : ?>
        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
    <?php elseif (session('errors') !== null) : ?>
        <div class="alert alert-danger" role="alert">
            <?php if (is_array(session('errors'))) : ?>
                <?php foreach (session('errors') as $error) : ?>
                    <?= $error ?>
                    <br>
                <?php endforeach ?>
            <?php else : ?>
                <?= session('errors') ?>
            <?php endif ?>
        </div>
    <?php endif ?>
    <form  method="post"  enctype="multipart/form-data">
    <div class="  m-5  card bg-secondary-subtle">
        <div class="card-body p-5">
            <div class="card mt-5 mx-5 mb-3" style="min-height: 25rem;">
            <img id="gbr" src="" style="max-width: 95%;height: auto;width: 100rem;object-fit: cover;" alt="">
                        
               
            </div>
           
                <div class="mb-3 ">
                    <select name="jenis" class="form-select f-sarabon f-el" placeholder="Pilih Dp atau Lunas" required>
                        <option disabled selected value>Pilih Dp atau Lunas</option>
                        <option value="Dp">Dp</option>
                        <option value="Lunas">Lunas</option>
                    </select>
                </div>

                <div class="mb-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="upimg"><i class="fa-solid fa-upload"></i></span> 
                        <input type="file" onchange="preview('gbr')" class="form-control f-sarabon f-el" name="image" id="upinput" aria-describedby="helpId" >
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="upimg">Rp</span> 
                        <input type="number"  class="form-control f-sarabon f-el" name="nominal"    required>
                    </div>
                </div>
                <div class="d-grid gap-1 mb-5">
                    <button type="submit" class="btn btn-dark f-sarabon f-me">Konfirmasi Pembayaran</button>
                </div>
            
        </div>
    </div></form>
</div>

<?= $this->endSection() ?>


<?= $this->Section('pageScripts') ?>
<script>
     function preview(a) {
        modalImage = document.getElementById(a);
        modalImage.src = URL.createObjectURL(event.target.files[0]);
    }

    $("#upimg").click(function() {
            $("#upinput").click();
        });

    function hideBrowseButton(event) {
        event.target.style.display = "none";
    }

    // Add the onclick event handler to all input file fields
    document.querySelectorAll("input[type=file]").forEach(hideBrowseButton);
</script>
<?= $this->endSection() ?>