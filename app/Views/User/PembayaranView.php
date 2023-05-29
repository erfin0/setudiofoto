<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Pembayaran' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="container mb-5 ">
    <div class="px-5 mx-auto text-center ">
        <h1 class=" mt-5 f-sarabon f-b text-uppercase">pembayaran</h1>
    </div>
    <div class="  m-5  card bg-secondary-subtle">
        <div class="card-body p-5">
            <div class="card mt-5 mx-5 mb-3" style="height: 25rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a card with a height of 100rem.</p>
                </div>
            </div>
            <form class="" action="">
                <div class="mb-3 ">
                    <select class="form-select f-sarabon f-el" placeholder="Pilih Dp atau Lunas" required>
                        <option disabled selected value>Pilih Dp atau Lunas</option>
                        <option value="1">Dp</option>
                        <option value="2">Lunas</option>
                    </select>
                </div>

                <div class="mb-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-upload"></i></span> 
                        <input type="file" class="form-control f-sarabon f-el" name="" id="" aria-describedby="helpId" required>
                    </div>
                </div>

                <div class="d-grid gap-1 mb-5">
                    <button type="submit" class="btn btn-dark f-sarabon f-me">Konfirmasi Pembayaran</button>
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