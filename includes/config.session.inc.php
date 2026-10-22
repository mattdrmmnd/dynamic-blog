<?php

//Manditory to have for sessions
//Changes the init files using php
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

$regenInterval = 60 * 30;
$idleLimit = 60 * 30; // 30 mins
$rememberLimit = 4 * 60 * 60; // 4 hours

// Garbage Collection after 4 hours
// must be set before session starts 
ini_set('session.gc_maxlifetime', $rememberLimit);

session_set_cookie_params([
    'lifetime' => 0, // Log out when browser closes, but browsers still may keep the cookie for ux purposes
    'samesite' => 'Lax',
    'path' => '/',
    'secure' => true, // https only
    'httponly' => true // user cant change anything using scripts
]);

session_start();

function regenerate_session_id()
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}


if (!isset($_SESSION["last_regeneration"]) || time() - $_SESSION["last_regeneration"] >= $regenInterval)
    {
        regenerate_session_id();
    }


// Refer to login.inc.php

if (isset($_SESSION["user_id"])) {

$limit = !empty($_SESSION["remember"]) ? $rememberLimit : $idleLimit;
$expired = time() - $_SESSION["last_activity"] > $limit;

    if ($expired) {
        session_unset();
        session_regenerate_id(true);
    } else {
        $_SESSION["last_activity"] = time();
    }
}

// Re-send cookie when remember is set
if (isset($_SESSION["user_id"]) && !empty($_SESSION["remember"])) {

    setcookie(session_name(), session_id(), [
        'expires' => time() + $rememberLimit,
        'path'     => '/',
        'samesite' => 'Lax',
        'secure'   => true,
        'httponly' => true,
    ]);    
}
