<?php
    require("app/app.php");
  
    $view_bag = [
        "title" => "Glossary List",
        "heading" => "Glossary"
    ];


    if(isset($_GET["search"])) {

        if (empty($_GET["search"])) {
            $view_bag["err_message"] = "Please type a value";
        };
        
        $items = Data::search_terms($_GET["search"]);
        $view_bag["heading"] = "Search results for {$_GET["search"]}";
    } else {
        $items = Data::get_terms();
    }

    view("index", $items);