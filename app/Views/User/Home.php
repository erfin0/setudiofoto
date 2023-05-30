<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'home' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<?= $this->include('/User/header') ?>
<?= $this->include('/User/testimoni') ?>
<?= $this->include('/User/galery') ?>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>


<?= $this->endSection() ?>