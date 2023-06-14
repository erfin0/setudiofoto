<?= $this->extend('/layout/' . setting('Aplikasi.layoutAdmin')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'List Admin' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <i class="fa-solid fa-user"></i> Daftar Admin
        </h5>
        <a type="button" href="<?= base_url('admin/addadmin')?>" class="btn btn-dark mt-5 float-end"><i class="fa-solid fa-user-plus"></i> Add admin</a>
      
    </div>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="row bg-body py-3">
       
        <div class="table-responsive">
            <table class="table table-primary" id="tabeladmin">
                <thead>
                    <tr>
                        <th> email </th>
                        <th> username </th>
                        <th> last active</th>
                        <th> # </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($admin)) {
                        foreach ($admin as $list) { ?>
                            <tr>
                                <td><?=$list->email??''?></td>
                                <td><?=$list->username??''?></td>
                                <td><?=$list->last_active??''?></td>
                                <td>R1C3</td>
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