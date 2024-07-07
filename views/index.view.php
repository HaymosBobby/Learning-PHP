<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="my-5"><?= $view_bag["heading"] ?></h1>
        </div>
    </div>
    <div class="row">
        <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="GET" class="form-inline mb-3">
            <div class="form-group">
                <input type="text" name="search" id="search">
                <input type="submit" value="Search">
            </div>
        </form>
    </div>
    <?php if (isset($view_bag["err_message"])) : ?>
        <small class="text-danger mb-3 d-block"><?= $view_bag["err_message"];?></small>
    <?php endif; ?>
    <div class="row">
        <?php if(count($model) > 0) {  ?>
            <table class="table table-striped">
                <?php foreach($model as $item) : ?>
                    <tr>
                        <td><a href="detail.php?term=<?= $item->id; ?>"><?= $item->term; ?></a></td>
                        <td><?= $item->definition; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php } else { ?>
            <p class="mt-3 py-3 bg-secondary text-white">No results found</p>
        <?php }; ?>
    </div>
</div>