<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?><?= isset($titel) ? $titel : lang('Auth.register') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="container f-sarabon mb-5">
    <div class="px-5 mx-auto text-center ">
        <h1 class=" mt-5  f-b text-uppercase">daftar!</h1>
        <?php if (setting('Auth.allowRegistration')) : ?>
            <h3 class="text-center">Sudah Punya Akun? <a href="<?= url_to('login') ?>">Masuk</a></h3>
        <?php endif ?>

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

    <?php if (session('message') !== null) : ?>
        <div class="alert alert-success" role="alert"><?= session('message') ?></div>
    <?php endif ?>
    <form action="<?= url_to('register') ?>" method="post">
        <?php csrf_field() ?>

        <div class="  m-5  card ">
            <div class="card-body p-5 container">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-sm-12 col-md-12 col-xl-6  order-xl-2 bg-secondary-subtle">
                        <img src="https://preview.colorlib.com/theme/bootstrap/login-form-08/images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-12  col-md-12 col-xl-6 ">
                        <div class="form-floating ">
                            <input type="text" class="form-control f-tin inlogin <?= isset(session('errors')['userfullname']) ? 'is-invalid' : '' ?> " name="userfullname" inputmode="text" placeholder="<?= lang('Auth.userfullname') ?>" value="<?= old('userfullname') ?>" required />
                            <label for="floatingInput" class="f-tin ">Nama lengkap</label>
                        </div>
                        <div class="form-floating ">
                            <input type="email" class="form-control f-tin inlogin <?= isset(session('errors')['email']) ? 'is-invalid' : '' ?> " name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required />
                            <label for="floatingInput" class="f-tin ">Email </label>
                        </div>
                        <div class="form-floating ">
                            <input type="text" class="form-control f-tin inlogin <?= isset(session('errors')['whatsapp']) ? 'is-invalid' : '' ?> " name="whatsapp" inputmode="text" placeholder="<?= lang('Auth.Whatsapp') ?>" value="<?= old('whatsapp') ?>" required />
                            <label for="floatingInput" class="f-tin ">No Whatsapp</label>
                        </div>
                        <div class="form-floating ">
                            <input type="text" class="form-control f-tin inlogin <?= isset(session('errors')['address']) ? 'is-invalid' : '' ?> " name="address" inputmode="text" placeholder="<?= lang('Auth.address"') ?>" value="<?= old('address') ?>" required />
                            <label for="floatingInput" class="f-tin ">Alamat Lengkap</label>
                        </div>
                        <!-- Username -->
                        <div class="form-floating ">
                            <input type="text" class="form-control f-tin inlogin <?= isset(session('errors')['username']) ? 'is-invalid' : '' ?> " name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required />
                            <label for="floatingInput" class="f-tin "><?= lang('Auth.username') ?></label>
                        </div>

                        <div class="form-floating ">
                            <input type="password" class="form-control f-tin inlogin <?= isset(session('errors')['password']) ? 'is-invalid' : '' ?> " name="password" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required />
                            <label for="floatingPassword " class="f-tin ">Password</label>
                        </div>

                        <div class="form-floating ">
                            <input type="password" class="form-control f-tin inlogin <?= isset(session('errors')['password_confirm']) ? 'is-invalid' : '' ?>" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>" required />
                            <label for="floatingPassword " class="f-tin "><?= lang('Auth.passwordConfirm') ?></label>
                        </div>


                        <div class="container">
                            <div class="row align-items-end">
                                <div class="col px-0">
                                    <button type="submit" class="btn text-uppercase btn-dark mt-3 px-4">Daftar!</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </form>
</div>


<?= $this->endSection() ?>