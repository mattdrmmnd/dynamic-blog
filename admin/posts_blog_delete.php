<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/auth.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    csrf_verify();
    
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    // Guard Clause handles the failure first
    // Then main work isnt nested inside an if
    if ($id === false || $id === null) {
        
        header('Location: ' . BASE_URL . 'admin/posts_blog.php?view=trash');
        die();

    }
    
    require_once __DIR__ . '/../includes/dbh.inc.php';
    require_once __DIR__ . '/../includes/posts_model.inc.php';

    $deleted = delete_blog_post($pdo, $id);

    $_SESSION["posts_message"] = $deleted === 1 ? 'Post deleted permanently.' : 'Post not found.';

    header('Location: ' . BASE_URL . 'admin/posts_blog.php?view=trash');
    die();
}
// For non-POST visits
header('Location: ' . BASE_URL . 'admin/posts_blog.php?view=trash');
exit;