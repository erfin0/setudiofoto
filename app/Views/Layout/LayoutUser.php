<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $this->renderSection('title') ?></title>
    <link href="<?= base_url() ?>/css/styles.css" rel="stylesheet" />
    <?= $this->renderSection('pageStyles') ?>
</head>

<body>
    <!-- navbar Component -->
    <?= $this->include('/layout/Component/navbarUser') ?>
    <!-- sidebar Component -->
    <main>
        <div>
            <?= $this->renderSection('main') ?>
        </div>
    </main>
    <?= $this->include('/layout/Component/footer') ?>

    <?= $this->renderSection('pageScripts') ?>
</body>

</html>