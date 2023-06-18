<?= $this->extend('/layout/' . setting('Aplikasi.layoutAdmin')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'edit admin' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <i class="fa-solid fa-user"></i> Edit Admin
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
                    <h5 class="text-center">Foto Profil </h5>
                </div>
              
                <div class="card-body ">
                    <div class="text-center">
                        <?php //isset($user) ? $user->renderAvatar(140) : (new \Bonfire\Users\User())->renderAvatar(140) 
                        ?>
                        <img id="avatar" src="<?=$user->avatarLink() ?>" class="rounded-circle  " style="max-width: 35%;height: auto;width: 100rem;aspect-ratio: 1 / 1;object-fit: cover;" alt="">
                        <div class="mt-5">
                            <button type="button" id="upimage" class="btn btn-dark px-5">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header py-3 ">
                    <h5>Data Admin </h5>
                </div>
                <div class="card-body">

                    <form class="row g-3" action="<?= base_url("/admin/admin/$user->id/update") ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $user->id ?>">
                        <?= csrf_field() ?>
                        <div class="col-md-6">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control <?= isset(session('errors')['userfullname']) ? 'is-invalid' : '' ?>" name="userfullname" value="<?= old('userfullname', $user->userfullname ?? '') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label ">Whatsaap</label>
                            <input type="text" class="form-control <?= isset(session('errors')['whatsapp']) ? 'is-invalid' : '' ?>" name="whatsapp" value="<?= old('whatsapp', $user->whatsapp ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control <?= isset(session('errors')['username']) ? 'is-invalid' : '' ?>" name="username" required value="<?= old('username', $user->username ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control <?= isset(session('errors')['password']) ? 'is-invalid' : '' ?> " name="password"   value="<?= old('password', $user->password ?? '') ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control <?= isset(session('errors')['email']) ? 'is-invalid' : '' ?>" name="email" required value="<?= old('email', $user->email ?? '') ?>">
                        </div>

                        <div class="col-12">
                            <label for="inputState" class="form-label">Posisi</label>

                            <select name="groups[]" class="form-select">
                                <?php $groups = setting('AuthGroups.groups');
                                asort($groups);
                                foreach ($groups as $group => $info) : ?>
                                    <option value="<?= $group ?>" <?php if (isset($user) && $user->inGroup($group)) : ?> selected <?php endif ?>>
                                        <?= $info['title'] ?? $group ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <input type="file" name="avatar" id="img1" onchange="preview('avatar')" class="d-none">

                        <div class="col-12">
                            <button type="submit" class="btn btn-dark px-5 float-end">Simpan</button>

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
    });
</script>

<?= $this->endSection() ?>