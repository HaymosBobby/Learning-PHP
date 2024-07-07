<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="my-5"><?= $view_bag["heading"] ?></h1>
        </div>
    </div>
    <div class="row">
        <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="form-group mb-2">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <?php if (isset($view_bag["err_message"])) : ?>
                <small class="text-danger mb-3 d-block"><?= $view_bag["err_message"];?></small>
            <?php endif; ?>
            <input type="submit" class="btn btn-primary" name="login">
        </form>
    </div>
</div>