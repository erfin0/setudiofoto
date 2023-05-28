<nav class="navbar navbar-expand-lg bg-body-secondary  py-3" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php $menu = setting()->get('aplikasi.MenuUser') ?? [];
                foreach ($menu as $m) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white mx-2" href="#"><?= $m['menu'] ?? 'menu' ?></a>
                    </li>
                <?php endforeach ?>
                <?php if (auth()->loggedIn()) { ?>
                    <li class="nav-item"><a class="nav-link text-white mx-2" href="<?= url_to('logout') ?>">Logout</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link text-white mx-2" href="<?= url_to('login') ?>">Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>