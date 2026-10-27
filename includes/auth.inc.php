<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/config.session.inc.php';


if (!isset($_SESSION["user_id"])) {
    header('Location: ' . BASE_URL . 'admin/login.php');
    exit;
}