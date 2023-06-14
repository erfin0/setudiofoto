  <!-- Sidebar-->
  <div class="border-end text-bg-dark" id="sidebar-wrapper">
      <div class="sidebar-heading border-bottom text-bg-dark">
          <a class="nav-link text-white mx-2" href="<?= base_url('/admin/dashboard') ?>">
          <i class="fas fa-chart-bar me-3"></i>
              Dashboard</a>

      </div>
      <ul class="nav nav-pills flex-column mb-auto">

          <?php $menu = setting()->get('aplikasi.MenuAdmin') ?? [];
            foreach ($menu as $m) : ?>
              <li class="nav-item ">
                  <a class="nav-link text-white mx-2 <?=(current_url() == base_url($m['url']))?'active':'' ?>" href="<?= base_url($m['url'] ?? '#') ?>">
                      <?= $m['icon'] ?? '' ?> <?= $m['menu'] ?? 'menu' ?>
                  </a>
              </li>
          <?php endforeach ?>
      </ul>
  </div>