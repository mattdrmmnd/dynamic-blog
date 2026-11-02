<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/config.session.inc.php';

if (!isset($_SESSION["user_id"])) {

    // Unauthorized client error status code
    http_response_code(401);
    exit;

} else {
    // No Content status code
    http_response_code(204);
    exit;

}