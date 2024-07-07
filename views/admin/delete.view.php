<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="my-5"><?= $view_bag["heading"] ?></h1>
        </div>
    </div>
    <div class="row">
        <p>Are you sure you want to delete the term <?= $model-> term; ?>?</p>
    </div>
    <div class="row">
        <form action="<?= $_SERVER["PHP_SELF"];?>" method="POST">
            <input type="hidden" name="term" value="<?= $model->id; ?>">
            <div class="form-group  mb-3">
                <input type="submit" value="Delete Term" class="btn btn-danger">
            </div>
        </form>
    </div>
    </div>
</div>