<?php

declare(strict_types=1);

function get_blog_posts(object $pdo, bool $trashed = false): array
{
    $condition = $trashed ? 'IS NOT NULL' : 'IS NULL';
    
    $query = "SELECT blog_posts.id, title, blog_posts.created_at, blog_posts.trashed_at, users.username, status FROM blog_posts LEFT JOIN  users ON users.id = blog_posts.user_id WHERE blog_posts.trashed_at $condition ORDER BY blog_posts.created_at DESC;";
    
    $stmt = $pdo->query($query);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// ?array because this returns null when no post is found
function get_blog_post(object $pdo, int $id): ?array
{

    $query = "SELECT id, title, body, status, featured_image, featured_image_alt, featured_image_caption FROM blog_posts WHERE id = :id AND trashed_at IS NULL;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT); // Use PARAM_INT whenever a number is expected  
    $stmt->execute();

    $post = $stmt->fetch();
    return $post ?: null;

}

function trash_blog_post(object $pdo, int $id): int
{
    $query = "UPDATE blog_posts SET trashed_at = NOW() WHERE id = :id AND trashed_at IS NULL;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT); // Use PARAM_INT whenever a number is expected
    $stmt->execute();

    return $stmt->rowCount();
}

function restore_blog_post(object $pdo, int $id): int
{
    $query = "UPDATE blog_posts SET trashed_at = NULL WHERE id = :id AND trashed_at IS NOT NULL;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT); // Use PARAM_INT whenever a number is expected
    $stmt->execute();

    return $stmt->rowCount();
}

function delete_blog_post(object $pdo, int $id): int
{
    $query = "DELETE FROM blog_posts WHERE id = :id AND trashed_at IS NOT NULL;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT); // Use PARAM_INT whenever a number is expected
    $stmt->execute();

    return $stmt->rowCount();
}

function get_blog_post_image(object $pdo, int $id): ?string
{
    $query = "SELECT featured_image FROM blog_posts WHERE id = :id AND trashed_at IS NOT NULL;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT); // Use PARAM_INT whenever a number is expected
    $stmt->execute();

    $image = $stmt->fetchColumn();
    return $image ?: null;
}

function create_blog_post(object $pdo, int $userId, string $title, string $body, string $status, ?string $filename, ?string $imageAlt, ?string $imageCaption): int
{
    $query = "INSERT INTO blog_posts (user_id, title, body, status, featured_image, featured_image_alt, featured_image_caption) VALUES (:user_id, :title, :body, :status, :featured_image, :featured_image_alt, :featured_image_caption);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT); // Use PARAM_INT whenever a number is expected
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":body", $body);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":featured_image", $filename);
    $stmt->bindParam(":featured_image_alt", $imageAlt);
    $stmt->bindParam(":featured_image_caption", $imageCaption);
    $stmt->execute();

    return (int) $pdo->lastInsertId();
}