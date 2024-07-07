<?php
    session_start();
    require "../app/app.php";

    ensure_user_is_authenticated();

    $view_bag = [
        "title" => "Create-Term",
        "heading" => "Create Term"
    ];

    if (is_post()){
        $term = sanitize($_POST["term"]);
        $definition = sanitize($_POST["definition"]);

        if (empty($term) || empty($definition)) {
            // TODO: Display message
            $view_bag["err_message"] = "Please fill in all fields!";
        } else {
            Data::add_term($term, $definition);
            redirect("index.php");
        }
    }

    
    
    view("admin/create", "");