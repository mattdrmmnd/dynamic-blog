<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]); // Trim counts whitespace as empty
    $pwd = $_POST["pwd"];
    
} else {
    header("Location: ../admin/login.php");
    die();
}

try {
    // order does matter
    require_once 'dbh.inc.php';
    require_once 'login_model.inc.php';
    require_once 'login_contr.inc.php';

    // SESSION
    require_once 'config.session.inc.php';

    $ip = $_SERVER["REMOTE_ADDR"];

    if (!csrf_is_valid()) {
        $_SESSION["errors_login"] = ["csrf" => "Your session expired. Please try again."];
        header("Location: ../admin/login.php");

        die();
    }

    // ERROR HANDLERS

    //holds errors that are returned and prevents user from logging in
    $errors = []; 

    if (is_empty_input($username, $pwd)) {
        $errors["empty_input"] = "Fill in all fields.";
    }

    // Put before password check 
    // Then locked out user cant keep testing passwords 
    if (recent_attempts($pdo, $ip, $username) >= 5) {
        $_SESSION["errors_login"] = ["locked" => "Too many login attempts. Please try again in 15 minutes."];

        header("Location: ../admin/login.php");
        die();
    }

    $result = get_user($pdo, $username);

    if (is_username_wrong($result)) {
        $errors["login_incorrect"] = "Incorrect login info.";
    }

    if (!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
        $errors["login_incorrect"] = "Incorrect login info.";
    }

    // Record the failure inside if ($error)
    if ($errors) {
        if (isset($errors["login_incorrect"])) {
            failed_attempt($pdo, $ip, $username);
        }
    }

    //This is the Post/Redirect/Get pattern redirecting after a POST prevents the browser from re-submitting the form if the user refreshes the error page. 
    if ($errors) {
        $_SESSION["errors_login"] = $errors;

        header("Location: ../admin/login.php");
        die();

    } // ----> No ERROR HANDLERS between this line and the Success Block  

    

    // Success Block
    // used for cookies
    session_regenerate_id(true);
    $_SESSION["user_id"] = $result["id"];
    $_SESSION["user_username"] = $result["username"];
    $_SESSION["last_regeneration"] = time();
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));

    // used for sign out calculations
    $_SESSION["login_time"] = time();
    $_SESSION["last_activity"] = time();
    $_SESSION["remember"] = isset($_POST['remember']); // true if "Keep me logged in" was checked
    
    clear_attempts($pdo, $ip);

    header("Location: ../admin/dashboard.php");
    die();

    
} catch (PDOException $e) {
    error_log($e->getMessage());
    die('Something went wrong. Please try again.');
}
