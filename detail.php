<?php
    require("app/app.php");

    if (!isset($_GET["term"])) {
        redirect("index.php");
    }

    $data = Data::get_term($_GET["term"]);

    if (!$data) {
        // 404
        redirect("not_found.php");
    }
    
    $view_bag = [
        "title" => "Term definition"
    ];

    view("detail", $data);