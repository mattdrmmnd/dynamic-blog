<?php

declare(strict_types=1);

function get_blog_posts(object $pdo): array
{
    $query = "SELECT blog_posts.id, title, blog_posts.created_at, users.username, status FROM blog_posts LEFT JOIN  users ON users.id = blog_posts.user_id WHERE blog_posts.trashed_at is NULL ORDER BY blog_posts.created_at DESC";
    $stmt = $pdo->query($query);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}