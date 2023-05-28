<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'home' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<?= $this->include('/User/header') ?>
<?= $this->include('/User/testimoni') ?>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>

<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            margin: 100,
            nav: true,
            loop: true,
            navText: ["<div class='nav-btn prev-slide'><i class='fa-solid fa-angle-left'></i></div>", "<div class='nav-btn next-slide'><i class='fa-solid fa-angle-right'></i></div>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });

    });
</script>
<?= $this->endSection() ?>