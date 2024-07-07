<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="my-5"><?= $view_bag["heading"] ?></h1>
        </div>
    </div>
    <div class="flex-row d-flex justify-content-between">
        <a href="create.php" class="btn btn-primary mb-4">Create New Term</a>
        <a href="/logout.php" class="btn btn-warning mb-4 text-white">Log out</a>
    </div>
    <div class="row">
        <?php if(count($model) > 0) {  ?>
            <table class="table table-striped">
                <?php foreach($model as $item) : ?>
                    <tr>
                        <td><?= $item->term; ?></td>
                        <td><?= $item->definition; ?></td>
                        <td><a href="edit.php?key=<?= $item->id ?>" class="btn btn-primary mx-2">Edit</a><a href="delete.php?key=<?= $item->id ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php } else { ?>
            <p class="mt-3 py-3 bg-secondary text-white">No results found</p>
        <?php }; ?>
    </div>
</div>