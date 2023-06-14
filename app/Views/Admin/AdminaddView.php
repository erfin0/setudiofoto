<?= $this->extend('/layout/' . setting('Aplikasi.layoutAdmin')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Add admin' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <i class="fa-solid fa-user"></i> Daftar Admin
        </h5>
        <button type="button" class="btn btn-dark mt-5 float-end"><i class="fa-solid fa-user-plus"></i> Add admin</button>
    </div>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="row g-3 bg-body py-3">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header py-3">
                    <h5 class="text-center">Foto Profil </h5>
                </div>
                <div class="card-body ">
                    <div class="text-center">
                        <img src="..." class="rounded" alt="...">

                        <svg width="160" height="148" viewBox="0 0 160 148" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="160" height="148" fill="url(#pattern0)" />
                            <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_290_631" transform="matrix(0.01 0 0 0.0108108 0 -0.0405405)" />
                                </pattern>
                                <image id="image0_290_631" width="100" height="100" xlink:href="data:image/png;base64,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" />
                            </defs>
                        </svg>
                    </div>
                    <p class="card-text">Text</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header py-3 ">
                    <h5>Data Admin </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Whatsaap</label>
                            <input type="text" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Username</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>

                        <div class="col-12">
                            <label for="inputState" class="form-label">State</label>
                            <select id="inputState" class="form-select">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Sign in</button>
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
    $(document).ready(function() {
        $('#tabeladmin').DataTable();
    });
</script>

<?= $this->endSection() ?>