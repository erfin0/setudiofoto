<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'home' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<?= $this->include('/User/Pakage/bestpackage') ?>
<?= $this->include('/User/Pakage/bestseller') ?>
<?= $this->include('/User/Pakage/pakage') ?>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>


<?= $this->endSection() ?>