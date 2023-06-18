<?= $this->extend('/layout/' . setting('Aplikasi.layoutAdmin')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Add portofolio' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <i class="fa-regular fa-images"></i> Add Portofolio
        </h5>

    </div>
</div>
<div class="container-fluid px-4 mt-3 ">
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

    <div class="row g-3 bg-body py-3 bg-secondary-subtle">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header py-3">
                    <h5 class="text-center">Foto Portofolio </h5>
                </div>
                <div class="card-body ">
                    <div class="text-center">
                        <?php //isset($user) ? $user->renderAvatar(140) : (new \Bonfire\Users\User())->renderAvatar(140) 
                        ?>
                        <img id="avatar" src="<?= base_url("img/img.png") ?>" style="max-width: 95%;height: auto;width: 100rem;object-fit: cover;" alt="">
                        <div class="mt-5">
                            <button type="button" id="upimage" class="btn btn-dark px-5  <?= isset(session('errors')['image']) ? 'btn-outline-danger' : '' ?>">Upload</button>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header py-3 ">
                    <h5>Data Portofolio </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3 " id="fupload" action="<?= base_url("/admin/portofolio") ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="form-floating mt-5 mb-3">
                            <input type="text" class="form-control f-sm <?= isset(session('errors')['judul']) ? 'is-invalid' : '' ?>" id="judulInput" name="judul" placeholder="Judul" value="<?= old('judul') ?>" required>
                            <label for="floatingInput">Judul</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control f-sm <?= isset(session('errors')['keterangan']) ? 'is-invalid' : '' ?>" id="keteranganinput" name="keterangan" placeholder="keterangan" value="<?= old('keterangan') ?>" required>
                            <label for="keteranganinput">Keterangan</label>
                        </div>

                        <input type="file" name="image" id="img1" onchange="preview('avatar')" class="d-none" >

                        <div class="col-12">
                            <button type="submit"  class="btn btn-dark mt-5 px-5 float-end">Simpan</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>
<script>
    function preview(a) {
        modalImage = document.getElementById(a);
        modalImage.src = URL.createObjectURL(event.target.files[0]);
    }

    $(document).ready(function() {
        $("#upimage").click(function() {
            $("#img1").click();
        });
        $("#fupload").submit(function(e) {
            // e.preventDefault();  
         
            if ($("#img1").val() == '') {
                alert("Anda belum memilih gambar!");
                return false;
            }
            return true;
        });
    });
</script>

<?= $this->endSection() ?>