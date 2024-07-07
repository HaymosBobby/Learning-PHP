<?php  
    session_start();
    require("app/app.php");

    $view_bag = [
        "heading" => "Login"
    ];

    if (is_user_authenticated()) {
        redirect("admin/");
    }

    if (is_post()) {
        $username = sanitize($_POST["username"]);
        $password = sanitize($_POST["password"]);

        // Validate username (email)
        if (empty($username)) {
            $view_bag["err_message"] = "Please fill in your email!";
        } else {
            $username = filter_var($username, FILTER_VALIDATE_EMAIL);
            if (!$username) {
                $view_bag["err_message"] = "Please enter a valid email!";
            }
        }

        // Validate password
        if (empty($password)) {
            if (empty($view_bag["err_message"])) { // Only set this error if no other error has been set
                $view_bag["err_message"] = "Please fill in your password!";
            }
        }

        // Proceed if there are no errors
        if (empty($view_bag["err_message"])) {
            $user = authenticate_user($username, $password);

            if (!$user) {
                $view_bag["err_message"] = "Invalid username or password";
            } else {
                $_SESSION["email"] = $user["username"];
                redirect("admin/");
            }
        }
    }

    // Render the login view
    view("login", "");

    
