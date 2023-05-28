<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $this->renderSection('title') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="<?= base_url() ?>/css/styles.css" rel="stylesheet" />

    <?= $this->renderSection('pageStyles') ?>
</head>

<body>
    <!-- navbar Component -->
    <header>
        <?= $this->include('/layout/Component/navbarUser') ?>
    </header>
    <!-- sidebar Component -->
    <main>
        <div>
            <?= $this->renderSection('main') ?>
        </div>
    </main>
    <?= $this->include('/layout/Component/footer') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="<?= base_url() ?>/css/styles.css" rel="stylesheet" />
    <script src="<?= base_url() ?>/js/n1.js"></script>
    <?= $this->renderSection('pageScripts') ?>
</body>

</html>