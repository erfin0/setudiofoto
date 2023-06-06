<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Booking' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="container f-sarabon mb-5">
    <div class="px-5 mx-auto text-center ">
        <h1 class=" mt-5  f-b text-uppercase">pembayaran</h1>
    </div>
    <div class="  m-5  card bg-secondary-subtle">
        <div class=" card-body p-5">

            <form action="">
                <div class="mb-3">
                    <label  class="form-label f-me">Nama</label>
                    <input value="<?=auth()->user()->username??''?>" required type="text" class="form-control f-tin" placeholder="nama di isi otomatis">
                </div>
                <div class="mb-3">
                    <label  class="form-label f-me">Email</label>
                    <input value="<?=auth()->user()->email??''?>" required type="email" class="form-control f-tin" placeholder="Email di isi otomatis">
                </div>
                <div class="mb-3">
                    <label  class="form-label f-me">whatsapp</label>
                    <input value="<?=auth()->user()->whatsapp??''?>" required type="text" class="form-control f-tin" placeholder="Whatshapp di isi otomatis">
                </div>
                <div class="mb-3">
                    <label  class="form-label f-me">Jumlah Orang</label>
                    <input required type="number" min=1  class="form-control f-tin" placeholder="masukan angka ">
                </div>
                <div class="mb-3">
                    <label  class="form-label f-me">Tanggal Booking</label>
                    <input required type="text" class="form-control f-tin" placeholder="Tanggal">
                </div>
                <div class="mb-5">
                    <label  class="form-label f-me">Waktu Booking</label>
                    <input required type="text" class="form-control f-tin" placeholder="Waktu ">
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