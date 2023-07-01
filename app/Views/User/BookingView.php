<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Booking' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="container f-sarabon mb-5">
    <div class="px-5 mx-auto text-center ">
        <h1 class=" mt-5  f-b text-uppercase">pembayaran</h1>
    </div>

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

    <div class="card bg-secondary-subtle">
        <div class=" card-body p-5">


            <form action="<?= base_url("booking") ?>" method="post">
                <input name='paket_id' type="hidden" value="<?= $_SESSION['paket'] ?>">
                <input type="hidden" name="tgl_pesan" value=<?= date("Y-m-d\TH:i:s", strtotime($tgl . ',' . $time)); ?> id="">
                    <div class="mb-3">
                        <label class="form-label f-me">Nama</label>
                        <input value="<?= auth()->user()->username ?? '' ?>" readonly="readonly" type="text" class="form-control f-tin " placeholder="nama di isi otomatis">
                    </div>
                    <div class="mb-3">
                        <label class="form-label f-me">Email</label>
                        <input value="<?= auth()->user()->email ?? '' ?>" readonly="readonly" type="email" class="form-control f-tin " placeholder="Email di isi otomatis">
                    </div>
                    <div class="mb-3">
                        <label class="form-label f-me">whatsapp</label>
                        <input value="<?= auth()->user()->whatsapp ?? '' ?>" readonly="readonly" type="text" class="form-control f-tin " placeholder="Whatshapp di isi otomatis">
                    </div>
                    <div class="mb-3">
                        <label class="form-label f-me">Jumlah Orang</label>
                        <input type="number" min=1 name="qty_peserta" value="<?= old('qty_peserta') ?>" class="form-control f-tin <?= isset(session('errors')['qty_peserta']) ? 'is-invalid' : '' ?>" placeholder="masukan angka ">
                    </div>
                    <div class="mb-3">
                        <label class="form-label f-me">Tanggal Booking</label>
                        <input readonly="readonly" required name='date' type="date" value="<?= $tgl ?? '' ?>" class="form-control f-tin <?= isset(session('errors')['tgl_booking_start']) ? 'is-invalid' : '' ?>" placeholder="Tanggal">
                    </div>
                    <div class="mb-5">
                        <label class="form-label f-me">Waktu Booking</label>
                        <input readonly="readonly" required name='time' type="time" value="<?= $time ?? '' ?>" class="form-control f-tin <?= isset(session('errors')['tgl_booking_start']) ? 'is-invalid' : '' ?>" placeholder="Waktu ">
                    </div>
                    <div class="d-grid gap-1 mb-5">
                        <button type="submit" class="btn btn-dark  f-me ">Request Booking</button>
                    </div>

            </form>
        </div>
    </div>



</div>

<?= $this->endSection() ?>


<?= $this->Section('pageScripts') ?>
<script>
    function hideBrowseButton(event) {
        event.target.style.display = "none";
    }

    // Add the onclick event handler to all input file fields
    document.querySelectorAll("input[type=file]").forEach(hideBrowseButton);
</script>
<?= $this->endSection() ?>