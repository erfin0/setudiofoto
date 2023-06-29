<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'About' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>

<section>
    <div class="container  mb-5 bg-secondary-subtle py-3">
        <div class="mx-auto text-center mb-5 ">
            <h5 class="til sarif ">Meet the Team</h5>
        </div>
        <div class="row justify-content-evenly">

          
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>


<?= $this->endSection() ?>