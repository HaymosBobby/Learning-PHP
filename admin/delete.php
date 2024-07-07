<?php
    session_start();
    require "../app/app.php";

    ensure_user_is_authenticated();

    $view_bag = [
        "title" => "Delete-Term",
        "heading" => "Delete Term"
    ];

    if (is_get()) {
        $key = sanitize($_GET['key']);

        if (empty($key)) {
            redirect("/not_found.php");
        }

        $term = Data::get_term($key);

        if ($term === false) {
            redirect("/not_found.php");
        }

        view("admin/delete", $term);
    }

    if (is_post()){
        $term = sanitize($_POST["term"]);

        if (empty($term)) {
            // TODO: Display message
            $view_bag["err_message"] = "Term does not exist!";
        } else {
            Data::delete_term($term);
            redirect("index.php");
        }
    }

    
    
    // view("admin/create", "");