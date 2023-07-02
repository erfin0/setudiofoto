<?= $this->extend('/layout/' . setting('Aplikasi.layoutUser')) ?>

<?= $this->section('title') ?>
<?= isset($titel) ? $titel : 'Pilih waktu' ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<section>
    <div class="container  mb-5 ">
        <div class="row ">
            <div class="col-12 col-sm-12 col-md-6 col-xl-4 mt-5 ">
                <div class="card text-start h-100" style="max-height: 20rem;overflow: hidden;">
                    <img class="card-img-top" src="<?= $terpilih->ximage('max') ?>" alt="<?= $terpilih->name ?>">

                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-8 mt-5 ">
                <div class="card text-start h-100">

                    <div class="card-body">
                        <h3><?= $terpilih->name ?></h3>
                        <h5><?= $terpilih->jenis ?></h5>
                        <p><?= $terpilih->keterangan ?></p>
                        <h4 class="mb-5"> <?= number_to_currency($terpilih->harga, 'idr', 'id_ID') ?></h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container  mb-5  ">

    <input type="date" style="width: 25rem;margin: auto;" class="form-control my-3" id="myDate" name="" min="<?= $sekarang ?>" max="<?= $bataswaktu ?>" value="<?= $tgl ?>" id="">

        <div class="row justify-content-evenly">

      

            <?php
            $today = date('Y-m-d');
            $tgl = $tgl ?? date('Y-m-d', strtotime('+ 1 days', strtotime($today)));
            $con = 0;
            $a = true;
            //////////////////
           
            // Get the day of the week of the specified date
            $dayOfWeek = date("w", strtotime($tgl));

            // Calculate the number of days to subtract from the specified date
            $daysToSubtract = $dayOfWeek - 1;

            // Get the date on Monday of the specified date
            $tglx=  date("Y-m-d", strtotime($tgl . "-2 days"));
            $mondayDate = date("Y-m-d", strtotime($tglx . "-$daysToSubtract days"));

           
            ///////////////

            while ($con <=8) {
                $date = date('Y-m-d', strtotime('+' . $con . ' days', strtotime($mondayDate))); ?>

                <a  href="<?= base_url('/pilihwaktu?paket=') . $terpilih->id . '&tgl=' . $date ?>" class="btn p-3  <?= ($date<=$today || $date>=$bataswaktu ) ? 'disabled' : 'zoom' ?> rounded-2 border col text-center <?= ($tgl == $date) ? 'border border-danger' : '' ?>" style="background-color: var(<?= $a ? '--bs-secondary-bg' : '--bs-primary-bg-subtle' ?>);">
                    <?= date('d M', strtotime($date)) ?> <br>
                    <?= date('D', strtotime($date)) ?>

                </a>
            <?php $a = !$a;
                $con++;
            }
            ?>
        </div>
    </div>


    <div class="container text-center ">
        <div class="row justify-content-evenly row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <?php foreach ($waktuterboking as $key => $val) { ?>
                <a href="<?= base_url("/booking?tgl=" . date('Y-m-d', strtotime($key)) . "&time=" . date('H:i', strtotime($key))) ?>" class="btn col px-3 m-3 btn-secondary <?= (!$val) ? 'disabled' : '' ?>" role="button"><?= date('H:i', strtotime($key)) ?></a>
            <?php } ?>

        </div>

    </div>

</section>
<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>
<script>
    function remove_parameters() {
        const url = window.location.href;
        const urlObj = new URL(url);
        urlObj.search = '';
        urlObj.hash = '';
        const uri = urlObj.toString();
        if (history.pushState) {
            window.history.pushState({
                path: uri
            }, '', uri);
        }
    }

    function update_query_parameters(key, val) {
        uri = window.location.href
            .replace(RegExp("([?&]" + key + "(?=[=&#]|$)[^#&]*|(?=#|$))"), "&" + key + "=" + encodeURIComponent(val))
            .replace(/^([^?&]+)&/, "$1?");
        if (history.pushState) {
            window.history.pushState({
                path: uri
            }, '', uri);
        }
        window.location.href=uri;
    }
    dateparameter = function(e) {
        update_query_parameters('tgl', $(e).data("tgl"));
    }

    const input = document.getElementById("myDate");

    function validateDate() {
        const date = new Date(input.value);
        const minDate = new Date("<?= $sekarang ?>");
        const maxDate = new Date("<?= $bataswaktu ?>");

        if ((date < minDate) || (date > maxDate)) {
            input.value = minDate.toISOString();
        }else{
           if (input.value !=''){ update_query_parameters('tgl',  input.value)}
        }
    }

   input.addEventListener("change", validateDate);
</script>

<?= $this->endSection() ?>