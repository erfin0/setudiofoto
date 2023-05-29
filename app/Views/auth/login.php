<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?><?= isset($titel) ? $titel : lang('Auth.login') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="container f-sarabon mb-5">
    <div class="px-5 mx-auto text-center ">
        <h1 class=" mt-5  f-b text-uppercase">Masuk!</h1>
        <?php if (setting('Auth.allowRegistration')) : ?>
            <h3 class="text-center">Belum Punya Akun? <a href="<?= url_to('register') ?>">Daftar</a></h3>
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
    <form action="<?= url_to('login') ?>" method="post">
        <?= csrf_field() ?>

        <div class="  m-5  card bg-secondary-subtle">
            <div class="card-body p-5 container">
                <div class="row justify-content-md-center">
                    <div class="col-sm-12 col-md-9 col-xl-8 ">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control f-tin inlogin" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput" class="f-tin ">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control f-tin inlogin" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword " class="f-tin ">Password</label>
                        </div>
                        <!-- Remember me -->
                        <?php if (setting('Auth.sessionConfig')['allowRemembering']) : ?>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="remember" class="form-check-input " <?php if (old('remember')) : ?> checked<?php endif ?>>
                                    <?= lang('Auth.rememberMe') ?>
                                </label>
                            </div>
                        <?php endif; ?>
                        <div class="container">
                            <div class="row align-items-end">
                                <div class="col px-0">
                                    <button type="submit" class="btn btn-dark mt-3 px-4">Masuk</button>
                                </div>
                                <div class="col">
                                    <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
                                        <span class="text-center "> <a class="nondekor" href="<?= url_to('magic-link') ?>">Lupa password?</a></span>
                                    <?php endif ?>
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