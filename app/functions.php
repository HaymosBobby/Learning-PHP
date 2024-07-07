<?php
    function redirect($url) {
        header("Location: $url");
        die();
    };

    function view($name, $model) {
        global $view_bag;
        require(APP_PATH . "views/layout.view.php");
    };

    function is_post() {
        return $_SERVER["REQUEST_METHOD"] === "POST";
    };

    function is_get() {
        return $_SERVER["REQUEST_METHOD"] === "GET";
    };

    function sanitize($value) {
        $temp = filter_var(trim($value), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($temp === false) {
            return "";
        }

        return $temp;
    };

    function is_user_authenticated() {
        return isset($_SESSION["email"]); 
    }

    function ensure_user_is_authenticated() {
        if (!is_user_authenticated()) {
            redirect("/login.php");
        }
    }

    function authenticate_user($email, $password) {
        // Assuming CONFIG["user_data"] is defined and contains user information.
        $users = CONFIG["user_data"];
        
        // Use array_filter to find the user with the matching email.
        $filteredUsers = array_filter($users, function($item) use ($email) {
            return $item["username"] === $email;
        });

        // array_filter returns an array, even if only one match is found.
        // Reset the array pointer to get the first (and ideally only) matched user.
        $user = reset($filteredUsers);

        // Check if user is found and the password matches.
        if (!$user || $user["password"] !== $password) {
            return false;
        }

        return $user;
    }
