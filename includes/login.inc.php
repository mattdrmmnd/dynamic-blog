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

    // ERROR HANDLERS
    $errors = []; //holds errors that are returned and prevents user from signing up

    if (is_empty_input($username, $pwd)) {
        $errors["empty_input"] = "Fill in all fields.";
    }

    $result = get_user($pdo, $username);

    if (is_username_wrong($result)) {
        $errors["login_incorrect"] = "Incorrect login info.";
    }
    if (!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
        $errors["login_incorrect"] = "Incorrect login info.";
    }

    // SESSION
    require_once 'config.session.inc.php';

    //This is the Post/Redirect/Get pattern redirecting after a POST prevents the browser from re-submitting the form if the user refreshes the error page. 
    if ($errors) {
        $_SESSION["errors_login"] = $errors;

        header("Location: ../admin/login.php");
        die();
    }   
    // Success Block
    // used for cookies
    session_regenerate_id(true);
    $_SESSION["user_id"] = $result["id"];
    $_SESSION["user_username"] = $result["username"];
    $_SESSION["last_regeneration"] = time();
    
    // used for sign out calculations
    $_SESSION["login_time"] = time();
    $_SESSION["last_activity"] = time();
    $_SESSION["remember"] = isset($_POST['remember']); // true if "Keep me logged in" was checked
    
    header("Location: ../admin/dashboard.php");
    die();

    
    } catch (PDOException $e) {
        error_log($e->getMessage());
        die('Something went wrong. Please try again.');
    }
