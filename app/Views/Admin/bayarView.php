<?php
foreach ($pembayaran as $val) {
?>


    <div class="card" style="width: 100%;">
        <img class="img-thumbnail" src="<?= $val->ximage() ?> " alt="">
        <div class="card-body">
            <div class="mb-3">
                <input class="form-check-input" name='setuju[]' type="checkbox" value="1" id="defaultCheck1">
                <label class="form-check-label" >
                     Check untuk setuju
                </label>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">nominal</label>
                <input type="text" class="form-control" name="nominal[]" value="<?= $val->nominal ?>" required >
                <input type="hidden" name="id[]" value="<?= $val->id ?>">
            </div>
        </div>
    </div>


<?php
} ?>