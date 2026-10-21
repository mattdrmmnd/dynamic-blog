<?php

//Manditory to have for sessions
//Changes the init files using php
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 0,
    'samesite' => 'Lax',
    'path' => '/',
    'secure' => true, // https only
    'httponly' => true // user cant change anything using scripts
]);

session_start();


if (!isset($_SESSION["last_regeneration"]) || time() - $_SESSION["last_regeneration"] >= 60 * 30)
    {
        regenerate_session_id();
    }

function regenerate_session_id()
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}