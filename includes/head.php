<?php
// Opens the page: doctype, <head> and the <body> tag
// Set these before including this file:
//   $pageTitle  the <title> text
//   $bodyClass  classes for the <body> tag
require_once __DIR__ . '/config.php';

$pageTitle = $pageTitle ?? 'Matt Likes Stacks';
$bodyClass = $bodyClass ?? 'flex flex-col min-h-screen font-inter text-white';

// Resumes a session only when the browser has one

if (isset($_COOKIE[session_name()])) //PHPSESSID
  {
  require_once __DIR__ . '/../includes/config.session.inc.php';
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="<?= BASE_URL ?>public/favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="darkreader-lock">
    <meta name="color-scheme" content="dark">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!--Material Symbols: add new icon names to icon_names, comma-separated and in alphabetical order-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=call_made" />

    <!--Built by Vite: npm run build or npm run watch-->
    <link rel="stylesheet" href="<?= BASE_URL ?>build/main.css">
    <script type="module" src="<?= BASE_URL ?>build/main.js"></script>

    <title><?= htmlspecialchars($pageTitle) ?></title>
  </head>
  <body class="<?= htmlspecialchars($bodyClass) ?>">
