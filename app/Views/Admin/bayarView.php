<?= $this->extend('/layout/' . setting('Aplikasi.layoutAdmin')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Pembayaran' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <i class="fa-solid fa-user"></i>Pembayaran
        </h5>

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
    <form action="<?= base_url("/admin/pembayaran/") ?>" method="post" enctype="multipart/form-data">

        <div class="row bg-body p-3">
            <?php $val=$pembayaran[0]; ?>
           
                <div class="card" style="width: 100%;">
                    <img class="img-thumbnail" src="<?= $val->ximage() ?> " alt="">
                    <div class="card-body">
                        <div class="mb-3">
                            <input class="form-check-input" name='setuju' type="checkbox" value="1" id="defaultCheck1">
                            <label class="form-check-label">
                                Check untuk setuju
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">nominal</label>
                            <input type="text" class="form-control" name="nominal" required>
                            <input type="hidden" name="id" value="<?= $val->id ?>">
                            <input type="hidden" name="idboking" value="<?= $id ?>">
                        </div>
                    </div>
                </div>
          
            <div class="col-12">
                <button type="submit" class="btn btn-dark mt-5 px-5 float-end">Simpan</button>
            </div>
        </div>

    </form>
</div>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>
<script>

</script>

<?= $this->endSection() ?>