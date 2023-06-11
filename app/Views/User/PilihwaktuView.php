<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Pilih waktu' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<section>
    <div class="container  mb-5 ">
        <div class="row ">
            <div class="col-12 col-sm-12 col-md-6 col-xl-4 mt-5">
                <div class="card text-start">
                    <img class="card-img-top" src="holder.js/100px180/" alt="Title">
                    <div class="card-body">
                        <h4 class="card-title">Title</h4>
                        <p class="card-text">Body</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-8 mt-5">
                <div class="card text-start">
                    <img class="card-img-top" src="holder.js/100px180/" alt="Title">
                    <div class="card-body">
                        <h4 class="card-title">Title</h4>
                        <p class="card-text">Body</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container  mb-5 bg-secondary-subtle py-3">

        <div class="row justify-content-evenly">

        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>


<?= $this->endSection() ?>