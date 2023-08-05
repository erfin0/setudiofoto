<?php

$rekening = setting()->get('aplikasi.rekening')

?>

<section>
    <div class="container mb-5">
        <div class=" mx-auto text-center ">
            <div class="card border-primary mx-auto"  style="width: 18rem;">
                <div class="card-body">
                    <p class=" sarif "><?= $rekening['bank']  ?></p>
                    <p class=" sarif "><?= $rekening['no']  ?></p>
                    <p class=" sarif "><?= $rekening['atasnama']  ?></p>
                </div>
            </div>
        </div>

    </div>

</section>