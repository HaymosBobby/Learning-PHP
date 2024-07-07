<?php
    session_start();
    require "../app/app.php";

    ensure_user_is_authenticated();

    $view_bag = [
        "title" => "Edit-Term",
        "heading" => "Edit Term"
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

        view("admin/edit", $term);
    }

    if (is_post()){
        $term = sanitize($_POST["term"]);
        $definition = sanitize($_POST["definition"]);
        $original_term = sanitize($_POST["original_term"]);

        if (empty($term) || empty($definition) || empty($original_term)) {
            // TODO: Display message
            $view_bag["err_message"] = "Please fill in all fields!";
            view("admin/edit", (object) ["term" => "$term", "definition" => "$definition"]);
        } else {
            Data::update_term($original_term, $term, $definition);
            redirect("index.php");
        }
    }

    
    
    // view("admin/create", "");