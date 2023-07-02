<?= $this->extend('/layout/' . setting('Aplikasi.layoutAdmin')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Booking' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="card" style="height: 9rem;">
    <div class="card-body">
        <h5 class="card-title">
            <i class="fa-solid fa-calendar-day"></i> Daftar Booking
        </h5>

    </div>
</div>
<div class="container-fluid px-4 mt-3">
    <?php if (session('error') !== null) : ?>
        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
    <?php elseif (session('errors') !== null) : ?>
        <div class="alert alert-danger" role="alert">
            <?php if (is_array(session('errors'))) : ?>
                <?php foreach (session('errors') as $error) : ?>
                    <?= $error ?>
                    <br>
                <?php endforeach ?>
            <?php else : ?>
                <?= session('errors') ?>
            <?php endif ?>
        </div>
    <?php endif ?>

    <?php if (session('message') !== null) : ?>
        <div class="alert alert-success" role="alert"><?= session('message') ?></div>
    <?php endif ?>
    <div class="row py-3">
        <div class="card">
            <div class="card-header py-3 ">
                <h5>Data Pembelian </h5>
            </div>
            <div class="card-body">
                <form class="row g-3" id="fboking" action="<?= base_url("/admin/booking") ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="col-md-12 ">
                        <div class="form-floating  " data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <input readonly id="floatinguserfullname" type="text" class="form-control <?= isset(session('errors')['userfullname']) ? 'is-invalid' : '' ?>" placeholder="name" name="userfullname" value="<?= old('userfullname') ?>" required>
                            <label for="floatinguserfullname">Nama</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <input readonly id="floatingemail" placeholder="email" type="email" class="form-control <?= isset(session('errors')['email']) ? 'is-invalid' : '' ?>" name="email" required value="<?= old('email') ?>">
                            <label for="floatingemail">Email</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <input readonly id="floatingwhatsapp" placeholder="whatsapp" type="text" class="form-control <?= isset(session('errors')['whatsapp']) ? 'is-invalid' : '' ?>" name="whatsapp" required value="<?= old('whatsapp') ?>">
                            <label for="floatingwhatsapp">Whatsaap</label>
                        </div>
                    </div>

                    <div class="form-floating col-6">
                        <select id="floatingpaket" name="paket_id" class="form-select" required>
                            <option disabled selected value>Pilih paket</option>
                            <?php
                            if (isset($paket)) {
                                foreach ($paket as $pkt) : ?>
                                    <option value="<?= $pkt->id ?>" <?= (old('paket_id') == $pkt->id) ? 'selected' : '' ?>>
                                        <?= $pkt->name . ' ' . $pkt->jenis ?>
                                    </option>
                            <?php endforeach;
                            } ?>
                        </select>

                        <label for="floatingpaket">paket</label>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input id="floatingqty_peserta" placeholder="qty_peserta" type="number" min=1 class="form-control <?= isset(session('errors')['qty_peserta']) ? 'is-invalid' : '' ?>" name="qty_peserta" value="<?= old('qty_peserta') ?>">
                            <label for="floatingqty_peserta">jumlah Peserta</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input required type="datetime-local" min="<?= date('Y-m-d\TH:i')  ?>" name="tgl_pesan" id="floatingtgl_pesan" placeholder="floatingtgl_pesan" value="<?= old('tgl_pesan') ?>" class="form-control <?= isset(session('errors')['tgl_pesan']) ? 'is-invalid' : '' ?>">
                            <label for="floatingtgl_pesan">tanggal</label>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <textarea placeholder="keterangan" name="keterangan" class="form-control <?= isset(session('errors')['keterangan']) ? 'is-invalid' : '' ?>" cols="30" rows="10"><?= old('keterangan') ?></textarea>
                    </div>
                    <input class="form-control" type="hidden" value="<?= old('users_id') ?>" id="users_id" name="users_id" required>
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark px-5 float-end ">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tabel User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <button class="btn btn-primary my-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa-solid fa-user-plus"></i> tambah
                </button>

                <div class="collapse my-2" id="collapseExample">
                    <div class="card card-body">
                        <form id="fadduser" class="row g-3" action="<?= base_url("/admin/user") ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="col-md-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control <?= isset(session('errors')['userfullname']) ? 'is-invalid' : '' ?>" name="userfullname" value="<?= old('userfullname', $user->userfullname ?? '') ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label ">Whatsaap</label>
                                <input type="text" class="form-control <?= isset(session('errors')['whatsapp']) ? 'is-invalid' : '' ?>" name="whatsapp" value="<?= old('whatsapp', $user->whatsapp ?? '') ?>">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control <?= isset(session('errors')['email']) ? 'is-invalid' : '' ?>" name="email" required value="<?= old('email', $user->email ?? '') ?>">
                            </div>



                            <div class="col-12">
                                <button type="submit" class="btn btn-dark px-5 float-end">Simpan</button>

                            </div>
                        </form>
                    </div>
                </div>
                <table class="table  table-bordered" id="tabeladmin" style="width: 100%;">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>
<script>
    $(document).ready(function() {
        table = $('#tabeladmin').DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                "url": "<?= site_url('/admin/tabel/users') ?>",
                "type": "POST",
                "data": function(data) {},
            },
            /*  "columnDefs": [{
                     "targets": [0],
                     "width": "4%"
                 }, {
                     "targets": [2],
                     "width": "10%",
                     orderable: false,
                 },
                 {
                     responsivePriority: 1,
                     targets: 2
                 },
                 {
                     responsivePriority: 0,
                     targets: 0
                 },
             ], */
            responsive: true,
        });





        $("#fadduser").submit(function(e) {
            e.preventDefault();
            form = $(this);
            $("#fadduser input").removeClass('is-invalid');
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"),
                type: 'POST',
                dataType: 'json',
                data: formData,
                async: true,
                processData: false,
                contentType: false,
                statusCode: {
                    401: function() {
                        location.href = "<?= base_url('login') ?>";
                    },

                    404: function() {
                        alert('page not found');

                    },
                    500: function(e) {
                        alert('e 500 kesalahan server');
                    },
                    400: function(e) {
                        if (e.responseJSON.messages) {
                            $.each(e.responseJSON.messages, function(k, v) {
                                $(`#fadduser input[name='${k}']`).addClass('is-invalid');
                                $(`#fadduser input[name='${k}']`).focus();
                            });
                        }
                    },

                    201: function(e) {
                        fill(e);
                        table.ajax.reload(null, false);
                        $("#fadduser")[0].reset();
                    }
                },
                beforeSend: function() {
                    type = "submit"
                    $(`#fadduser button[type="submit"]`).prop('disabled', true);
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                complete: function() {
                    $(`#fadduser button[type="submit"]`).prop('disabled', false);
                }
            });
        });


    });


    function terpilih(e) {

        $('#floatinguserfullname').val($(e).attr('data-userfullname'));
        $('#floatingemail').val($(e).attr('data-email'));
        $('#floatingwhatsapp').val($(e).attr('data-wa'));
        $('#users_id').val($(e).attr('data-id'));
        $('#exampleModal').modal('hide');
    }

    function fill(e) {
        console.log(e);
        $('#floatinguserfullname').val(e.userfullname);
        $('#floatingemail').val(e.email);
        $('#floatingwhatsapp').val(e.whatsapp);
        $('#users_id').val(e.id);
        $('#exampleModal').modal('hide');
    }

    $("#fboking").submit(function(e) {
        // e.preventDefault();  

        if ($("#users_id").val() == '') {
            alert("Anda belum memilih peserta!");
            $('#exampleModal').modal('show');
            return false;
        }
        return true;
    });



    const myModal = document.getElementById('exampleModal')
       myModal.addEventListener('shown.bs.modal', () => {
        $('#collapseExample').removeClass( "show" );
    })
</script>

<?= $this->endSection() ?>