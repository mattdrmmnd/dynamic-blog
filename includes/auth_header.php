<?php
// Header for the logged-out admin pages (login, request access)
// Set $headerMessage before including this file: the note shown top right
require_once __DIR__ . '/config.php';

$headerMessage = $headerMessage ?? '';
?>
        <header class="max-w-5xl mx-auto px-5 py-3 min-h-40 flex">
        <div class="flex flex-col items-center sm:items-end w-full">
            <p class="self-end mb-2 sm:mt-2 tracking-wider text-xs bg-black p-2 rounded-sm"><?= htmlspecialchars($headerMessage) ?></p>

            <div class="flex flex-col items-center w-full flex-1 sm:flex-row sm:justify-between sm:items-center">

            <div class="mb-10">
              <a href="<?= BASE_URL ?>" class="inline-block bg-black/50 rounded-md">
                <img class="block transition hover:filter-[brightness(0)_saturate(100%)_invert(85%)_sepia(40%)_saturate(600%)_hue-rotate(320deg)]" src="<?= BASE_URL ?>public/images/logo.svg" alt="Matt The Dev Logo" />
              </a>
            </div>

            </div>
        </div>
        </header>
