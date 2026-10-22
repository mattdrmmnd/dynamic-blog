<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/config.session.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    csrf_verify();
    
    session_unset();

    // Deletes Cookie
    $params = session_get_cookie_params();
    setcookie(session_name(),
     '', 
     time() - 3600, 
     $params['path'], 
     $params['domain'], 
     $params['secure'], 
     $params['httponly']);

    session_destroy();

    header('Location: ' . BASE_URL . 'admin/login.php');

    die();
}
// For non-POST visits
header('Location: ' . BASE_URL . 'admin/login.php');
exit;

