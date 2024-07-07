<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="my-5"><?= $view_bag["heading"] ?></h1>
        </div>
    </div>
    <div class="row">
        <form action="<?= $_SERVER["PHP_SELF"];?>" method="POST">
            <div class="form-group mb-3">
                <label for="term">Term:</label>
                <input class="form-control" type="text" name="term" id="term">
            </div>
            <div class="form-group  mb-3">
                <label for="definition">Definition:</label>
                <textarea class="form-control" name="definition" id="definition"></textarea>
            </div>
            <?php if (isset($view_bag["err_message"])) : ?>
                <small class="text-danger mb-3 d-block"><?= $view_bag["err_message"];?></small>
            <?php endif; ?>
            <div class="form-group  mb-3">
                <input type="submit" value="Create Term" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>
</div>