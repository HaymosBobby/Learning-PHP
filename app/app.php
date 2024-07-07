<?php
    define("APP_PATH", dirname(__DIR__) . "/");


    require("config.php");
    require(APP_PATH . "data/data.class.php");
    require(APP_PATH . "data/file_data_provider.class.php");
    require(APP_PATH . "data/mysql_data_provider.class.php");
    require("functions.php");
    // require(APP_PATH . "data/file_functions.php");
    // Data::initialize(new FileDataProvider(CONFIG["data_file"]));
    Data::initialize(new MySqlDataProvider(CONFIG["db"]));