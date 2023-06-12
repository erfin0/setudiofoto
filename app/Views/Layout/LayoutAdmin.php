<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $this->renderSection('title') ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>vendors/bs-5/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>css/admin.css" rel="stylesheet" />

    <script src="<?= base_url() ?>js/jquery-3.7.0.min.js"></script>
    <script src="<?= base_url() ?>js/popper.min.js"></script>
    <script src="<?= base_url() ?>vendors/bs-5/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>js/admin.js"></script>
    <?= $this->renderSection('pageStyles') ?>
</head>

<body>

    <div class="d-flex" id="wrapper">
        <?= $this->include('/layout/Component/sidebar') ?>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
           
            <?= $this->include('/layout/Component/navbarAdmin') ?>
            <!-- Page content-->
           
                <main>
                    <div>
                        <?= $this->renderSection('main') ?>
                    </div>
                </main>
           
        </div>
    </div>

    
    <?= $this->renderSection('pageScripts') ?>
</body>

</html>