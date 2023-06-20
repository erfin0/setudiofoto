<?= $this->extend('/layout/' . setting('Aplikasi.layoutAdmin')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'balas testimoni' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <i class="fa-regular fa-comments"></i> Balas testimoni
        </h5>
        <p class="mt-3">
            <?= $testimoni->keterangan ?? '' ?>
        </p>
    </div>
</div>
<div class="container-fluid px-4 mt-3">
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

    <?php if (session('message') !== null) : ?>
        <div class="alert alert-success" role="alert"><?= session('message') ?></div>
    <?php endif ?>



    <div class="card bg-body ">
        <div class="card-header ">
            <h3 class="text-center my-3"> Balas comment</h3>
        </div>
        <div class="card-body">
            <form method="post">

                <div class="my-3">
                    <textarea required class="form-control <?= isset(session('errors')['comment']) ? 'is-invalid' : '' ?>" name="comment" id="exampleFormControlTextarea1" rows="3"><?= old('comment') ?></textarea>
                </div>



                <button type="submit" class="btn btn-dark mt-5 px-5 float-end">Simpan</button>


            </form>

        </div>

    </div>
</div>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>
<script>


</script>

<?= $this->endSection() ?>