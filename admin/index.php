<?php
    session_start();
    require "../app/app.php";

    ensure_user_is_authenticated();

    $view_bag = [
        "title" => "Glossary List",
        "heading" => "Glossary"
    ];
    
    view("admin/index", Data::get_terms());