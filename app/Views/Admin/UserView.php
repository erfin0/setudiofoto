<?= $this->extend('/layout/' . setting('Aplikasi.layoutAdmin')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'List user' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="card" style="height: 9rem;">
    <div class="card-body">
        <h5 class="card-title">
            <i class="fa-solid fa-user"></i> Daftar User
        </h5>


    </div>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="row bg-body py-3">

        <div class="table-responsive">
            <table class="table  table-bordered" id="tabeladmin">
                <thead>
                    <tr>
                        <th> email </th>
                        <th> username </th>
                        <th> whatsapp </th>
                        <th> address </th>
                        <th> last active</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($admin)) {
                        foreach ($admin as $list) { ?>
                            <tr>
                                <td><?= $list->email ?? '' ?></td>
                                <td><?= $list->username ?? '' ?></td>
                                <td><?= $list->whatsapp ?? '' ?></td>
                                <td><?= $list->address ?? '' ?></td>
                                <td><?= $list->last_active ?? '' ?></td>
                            </tr>

                    <?php }
                    } ?>


                </tbody>
            </table>
        </div>

    </div>
</div>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>
<script>
    $(document).ready(function() {
        $('#tabeladmin').DataTable();
    });
</script>

<?= $this->endSection() ?>