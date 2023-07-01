<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'About' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>

<section>
    <div class="container  mb-5  py-3">
        <div class="row justify-content-evenly align-items-center">

            <div class="col-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 d-flex justify-content-center bg-secondary-subtle">
                <p class="til sarif text-center py-5 my-5"> Contact us to more Information </p>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 d-flex justify-content-center">
                <div>
                    <?php $contact=setting()->get('aplikasi.contact') ?>
                    <div class=" sarif text-center  "> Alamat: <?= $contact['alamat'] ?? '' ?></div>

                    <div class=" sarif text-center  ">

                      <!-- mail -->
                    <?= isset($contact['mail'])?'<a class="btn p-0 m-1  " href="mailto:'.$contact['mail'].'" role="button"> <i class="zoom fa-solid fa-envelope  fa-lg"></i></a>':'' ?>
                      
                        <!-- wa -->
                        <?= isset($contact['wa'])?'<a class="btn p-0 m-1  " href="'.linkwa($contact['wa']).'" role="button"><i class="zoom fa-brands fa-whatsapp  fa-lg"></i></a>':'' ?>

                        <!-- Facebook -->
                         <?= isset($contact['facebook'])?'<a class="btn p-0 m-1  " href="'.$contact['facebook'].'" role="button"><i class="zoom fa-brands fa-facebook fa-lg"></i></i></a>':'' ?>

                        <!-- Twitter -->
                         <?= isset($contact['twitter'])?'<a class="btn p-0 m-1  " href="'.$contact['twitter'].'" role="button"><i class="zoom fab fa-twitter fa-lg"></i></a>':'' ?>

                        <!-- Google -->
                         <?= isset($contact['google'])?'<a class="btn p-0 m-1  " href="'.$contact['google'].'" role="button"><i class="zoom fab fa-google fa-lg"></i></a>':'' ?>

                        <!-- Instagram -->
                         <?= isset($contact['instagram'])?'<a class="btn p-0 m-1  " href="'.$contact['instagram'].'" role="button"><i class="zoom fab fa-instagram fa-lg"></i></a>':'' ?>

                        <!-- Linkedin -->
                         <?= isset($contact['linkedin'])?'<a class="btn p-0 m-1  " href="'.$contact['linkedin'].'" role="button"><i class="zoom fab fa-linkedin-in fa-lg"></i></a>':'' ?>

                        <!-- Github -->
                         <?= isset($contact['github'])?'<a class="btn p-0 m-1  " href="'.$contact['github'].'" role="button"><i class="zoom fab fa-github fa-lg"></i></a>':'' ?>

                        <!-- youtube -->
                         <?= isset($contact['youtube'])?'<a class="btn p-0 m-1  " href="'.$contact['youtube'].'" role="button"> <i class="zoom fa-brands fa-youtube fa-lg"></i></a>':'' ?>

                        <!-- tiktok -->
                         <?= isset($contact['tiktok'])?'<a class="btn p-0 m-1  " href="'.$contact['tiktok'].'" role="button"> <i class="zoom fa-brands fa-tiktok fa-lg"></i></a>':'' ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<section>
    <div class="container mb-0 my-0">
        <div class="row justify-content-evenly align-items-center">
            <iframe src="<?= setting()->get('aplikasi.contact')['map'] ?? '' ?>" width="auto" height="300" style="border:0;padding: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>


<?= $this->endSection() ?>