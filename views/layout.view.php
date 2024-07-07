<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Glossary</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed top">
        <div class="container"><a href="" class="navbar-brand">PHP Fundamentals: <?= $view_bag["title"] ?? ""; ?></a></div>
    </nav>

    <!-- Content -->
    <?php require "$name.view.php"?>
</body>
</html>