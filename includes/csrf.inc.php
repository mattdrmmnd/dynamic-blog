<?php 

// Prints the hidden token field
// Use in every POST form
// ?? '' means: use an empty string if it's missing
function csrf_field(): void
{
    echo '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION["csrf_token"] ?? '') . '">';
}

// true when the submitted token matches the session's
function csrf_is_valid(): bool
{
    $token = $_POST["csrf_token"] ?? '';
    return is_string($token) && hash_equals($_SESSION["csrf_token"] ?? '', $token);
}

// Stops the request unless the token is valid. 
// Use in handlers like logout and delete
function csrf_verify(): void
{

    if (!csrf_is_valid()) {
        http_response_code(403);
        die('Invalid request.');
    }
}