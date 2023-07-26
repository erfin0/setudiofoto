<nav class="navbar navbar-expand-lg bg-body-secondary  py-3" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">
            <img style="height: 60px;-webkit-filter: invert(100%);" src="<?= base_url('img/logo.png') ?>" alt="<?= setting()->get('aplikasi.perusahaan') ?? '' ?>"> <?= setting()->get('aplikasi.perusahaan') ?? '' ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php $menu = setting()->get('aplikasi.MenuUser') ?? [];
                foreach ($menu as $m) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white mx-2" href="<?= base_url($m['url'] ?? '#') ?>"><?= $m['menu'] ?? 'menu' ?></a>
                    </li>
                <?php endforeach ?>
                <?php if (auth()->loggedIn()) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mx-2" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <i class="fa-regular fa-circle-user fa-xl"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a class="dropdown-item text-white " href="<?= base_url('transaksi') ?>">transaksi</a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <?php if (auth()->user()->inGroup('admin')) { ?>
                                <li class="nav-item">
                                    <a class="dropdown-item text-white " href="<?= base_url('/admin/admin') ?>"><i class="fa-solid fa-gears"></i> admin</a>
                                </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a class="dropdown-item text-white " href="<?= url_to('logout') ?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item"><a class="nav-link text-white mx-2" href="<?= url_to('logout') ?>">Logout</a></li> -->
                <?php } else { ?>



                    <li class="nav-item"><a class="nav-link text-white mx-2" href="<?= url_to('login') ?>">Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>