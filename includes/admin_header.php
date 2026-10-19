<?php require_once __DIR__ . '/config.php'; ?>
        <header class="max-w-5xl mx-auto px-5 py-3 w-full flex items-center justify-between">
            <a href="<?= BASE_URL ?>admin/dashboard.php"><img class="h-10" src="<?= BASE_URL ?>public/images/logo.svg" alt="Matt Likes Stacks Logo" /></a>

            <form action="<?= BASE_URL ?>admin/logout.php" method="post">
                <button type="submit" class="uppercase tracking-wider text-xs bg-black p-2 rounded-sm hover:bg-light-purple transition-colors">Logout</button>
            </form>
        </header>
