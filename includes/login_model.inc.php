<?php

declare(strict_types=1);

function get_user(object $pdo, string $username)
{
    $query = "SELECT *  FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function recent_attempts(object $pdo, string $ip, string $username): int
{
    $query = "SELECT COUNT(*) FROM login_attempts WHERE ip = :ip AND username = :username AND attempted_at > NOW() - INTERVAL 15 MINUTE;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":ip", $ip);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    return (int) $stmt->fetchColumn();

}

function failed_attempt(object $pdo, string $ip, string $username): void
{
    $query = "DELETE FROM login_attempts WHERE attempted_at < NOW() - INTERVAL 1 DAY;";
 
    $query = "INSERT INTO login_attempts (ip, username) VALUES (:ip, :username);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":ip", $ip);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
}

function clear_attempts(object $pdo, string $ip): void
{
    $query = "DELETE FROM login_attempts WHERE ip = :ip;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":ip", $ip);
    $stmt->execute();
}
