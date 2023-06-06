<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'About' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<header>
    <div class="container mb-5">
        <div class="px-5 mx-auto text-center ">
            <p class=" mt-5 mb-0 til sarif ">About the</p>
            <p class="logoname sarif text-uppercase"><?= setting()->get('aplikasi.perusahaan') ?></p>
            <p class="mt-4"><?= setting()->get('aplikasi.about') ?></p>
        </div>
    </div>
</header>
<section>
    <div class="container  mb-5 bg-secondary-subtle py-3">
        <div class="mx-auto text-center mb-5 ">
            <h5 class="til sarif ">Meet the Team</h5>
        </div>
        <div class="row justify-content-evenly">

            <?php $item = setting()->get('aplikasi.about_team') ?? [];
            foreach ($item as $m) : ?>
                <div class="col-12 col-sm-12 col-md-6 col-xl-4 col-xxl-4 d-flex justify-content-center">
                    <div class="card bg-transparent border border-0" style="width: 18rem;">
                        <img src="<?= reimg( $m['image'] ?? '') ?>" class="card-img-top" alt="...">
                        <div class="card-body text-center ">
                            <p class=" sarif card-text"><?= $m['title'] ?? '' ?></p>
                        </div>
                    </div>
                </div>
                
            <?php endforeach ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>


<?= $this->endSection() ?>